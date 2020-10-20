<?php namespace App\Controllers;

use \App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

	public function index()
	{
        if (session()->get('isLoggedin')) {
            return redirect()->to('/admin/product');
        }
        $data = [
            'validation' => \Config\Services::validation()
        ];
        
		return view('login', $data);
    }
    
    public function login()
	{
		if (!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])) {
            return redirect()->to('/admin/login')->withInput();
        }
        $data = $this->userModel->getUser($this->request->getPost('email'));
        if ($data['password'] != $this->request->getPost('password')) {
            if (!$data) {
                session()->setFlashdata('logerror', 'Email not registered !!');
                return redirect()->to('/admin/login')->withInput();
            }
            session()->setFlashdata('logerror', 'Wrong Password !!');
            return redirect()->to('/admin/login')->withInput();
        }
        
        session()->set([
            'email' => $data['email'],
            'isLoggedin' => true
        ]);
        
        return redirect()->to('/admin/product');
    }

    public function logout() 
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
	//--------------------------------------------------------------------

}
