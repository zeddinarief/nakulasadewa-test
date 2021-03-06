<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['email', 'password', 'telp'];

    public function getUser($email)
    {
        return $this->where(['email' => $email])->first();
    }
}