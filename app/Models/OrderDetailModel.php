<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'order_details';

    protected $allowedFields = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'qty',
        'subtotal'
    ];

    protected $useTimestamps = true;
}