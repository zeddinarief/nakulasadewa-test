<?php namespace App\Controllers;

use \App\Models\ProductModel;

class Product extends BaseController
{
	protected $productModel;
	public function __construct()
	{
		$this->productModel = new ProductModel(); 
	}

	public function index()
	{
		$data = [
			'title' => 'Products',
			'products' => $this->productModel->getProduct()
		];
		return view('list_product', $data);
	}

	public function detail($slug)
	{
		$data = [
			'title' => 'Products',
			'validation' => \Config\Services::validation(),
			'product' => $this->productModel->getProduct($slug)
		];
		return view('detail_product', $data);
	}

	//--------------------------------------------------------------------
	// ADMIN
	//--------------------------------------------------------------------
	
	public function data_product()
	{
		if (!session()->has('isLoggedin')) {
			return redirect('admin/login');
		}
		
		$products = $this->productModel->getProduct();
		
		$data = [
			'title' => 'Admin | Product',
			'page' => 'product',
			'products' => $products
		];

		return view('data_product', $data);
	}

	public function add()
	{
		if (!session()->has('isLoggedin')) {
			return redirect('admin/login');
		}

		$data = [
			'title' => 'Admin | Add Product',
			'page' => 'product',
			'validation' => \Config\Services::validation()
		];
		return view('add_product', $data);
	}

	public function save()
	{
		if (!session()->has('isLoggedin')) {
			return redirect('admin/login');
		}

		if (!$this->validate([
			'productName' => [
				'label' => 'Product name',
				'rules' => 'required|is_unique[products.product_name]',
				'errors' => [
					'is_unique' => '{field} has registered'
				]
			],
			'description' => 'required',
			'photo' => 'uploaded[photo]|is_image[photo]'
		])) {
			return redirect()->back()->withInput();
		}
		// get file foto
		$filePhoto = $this->request->getFile('photo');
		// set nama random photo
		$photoName = $filePhoto->getRandomName();
		// move file to folder upload_product
		$filePhoto->move('upload_product/', $photoName);

		// set slug
		$slug = url_title($this->request->getPost('productName'), '-', true);

		// save to database
		$this->productModel->save([
			'product_name' => $this->request->getPost('productName'),
			'description' => $this->request->getPost('description'),
			'photo' => $photoName,
			'slug' => $slug
		]);
		
		return redirect()->to('/admin/product');
	}

	public function edit($slug)
	{
		if (!session()->has('isLoggedin')) {
			return redirect('admin/login');
		}
		
		$data = [
			'title' => 'Admin | Add Product',
			'page' => 'product',
			'validation' => \Config\Services::validation(),
			'product' => $this->productModel->getProduct($slug)
		];
		return view('edit_product', $data);
	}

	public function update($id)
	{
		if (!session()->has('isLoggedin')) {
			return redirect('admin/login');
		}

		// dd($this->request->getPost('productName'));
		if (!$this->validate([
			'productName' => [
				'label' => 'Product name',
				'rules' => 'required|is_unique[products.product_name,id,'.$id.']',
				'errors' => [
					'is_unique' => '{field} has registered'
				]
			],
			'description' => 'required',
			'photo' => 'is_image[photo]'
		])) {
			return redirect()->back()->withInput();
		}

		// get file foto
		$filePhoto = $this->request->getFile('photo');
		$oldPhotoName = $this->request->getPost('oldPhoto');

		if ($filePhoto->getError() == 4) {
			// nama photo tetap jika tidak ganti photo
			$photoName = $oldPhotoName;
		} else {
			// set nama random photo
			$photoName = $filePhoto->getRandomName();
			// move file to folder upload_product
			$filePhoto->move('upload_product/', $photoName);
			// hapus foto lama
			unlink('upload_product/' . $oldPhotoName);
		}
		
		// set slug
		$slug = url_title($this->request->getPost('productName'), '-', true);

		// save to database
		$this->productModel->save([
			'id' => $id,
			'product_name' => $this->request->getPost('productName'),
			'description' => $this->request->getPost('description'),
			'photo' => $photoName,
			'slug' => $slug
		]);
		
		return redirect()->to('/admin/product');
	}

	public function delete($id)
	{
		if (!session()->has('isLoggedin')) {
			return redirect('admin/login');
		}

		$cek_data = $this->productModel->find($id);
		
		if (!$cek_data) {
			return redirect()->to('/admin/product');
		}
		
		unlink('upload_product/' . $cek_data['photo']);
		$this->productModel->delete($id);
		return redirect()->to('/admin/product');
    }
}
