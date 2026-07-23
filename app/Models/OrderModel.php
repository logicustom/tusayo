<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'invoice',
        'user_id',
        'subtotal',
        'shipping_cost',
        'discount',
        'grand_total',
        'payment_method',
        'payment_status',
        'order_status',
        'notes',
        'snap_token',
        'snap_created_at'
    ];

    protected $useTimestamps = true;

    public function getOrders()
    {
        return $this->db->table('orders o')
            ->select('
                o.*,
                u.name as customer,
                u.email
            ')
            ->join('users u', 'u.id = o.user_id', 'left')
            ->orderBy('o.id', 'ASC')
            ->get()
            ->getResultArray();
    }

}