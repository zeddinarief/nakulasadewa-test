<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $useTimestamps = true;
    protected $allowedFields = ['customer_name', 'description', 'phone', 'product'];

    public function getOrder()
    {
        return $this->db->table('orders o')
        ->select('o.*, p.product_name, p.slug as slug')
        ->join('products p', 'p.id = o.product')
        ->get()->getResultArray();
    }
}