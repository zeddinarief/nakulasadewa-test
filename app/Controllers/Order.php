<?php namespace App\Controllers;

use \App\Models\OrderModel;

class Order extends BaseController
{
	protected $orderModel;
	public function __construct()
	{
		$this->orderModel = new OrderModel();
	}

	public function index()
	{
		if (!session()->has('isLoggedin')) {
			return redirect('admin/login');
		}
		
		$orders = $this->orderModel->getOrder();
		// dd($orders['product_name']);
		$data = [
			'title' => 'Admin | Order',
			'page' => 'order',
			'orders' => $orders
		];

		return view('data_order', $data);
    }
    

	//--------------------------------------------------------------------
	// USER
	//--------------------------------------------------------------------

	public function add_order()
	{
		if (!$this->validate([
			'cust_name' => [
				'label' => 'Your name',
				'rules' => 'required'
			],
			'description' => 'required',
			'phone' => 'required|numeric'
		])) {
			return redirect()->back()->withInput();
		}
		
		// save to database
		$this->orderModel->save([
			'customer_name' => $this->request->getPost('cust_name'),
			'description' => $this->request->getPost('description'),
			'phone' => $this->request->getPost('phone'),
			'product' => $this->request->getPost('id_product')
		]);
		
		session()->setFlashdata('order', 'Successfully ordered the product!!');
		return redirect()->back();
	}
}
