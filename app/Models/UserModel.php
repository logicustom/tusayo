<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
        'provider',
        'created_at',
        'updated_at'
    ];
}