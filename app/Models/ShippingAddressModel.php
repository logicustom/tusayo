<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingAddressModel extends Model
{
    protected $table = 'shipping_addresses';

    protected $allowedFields = [
        'order_id',
        'customer_name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code'
    ];

    protected $useTimestamps = true;
}