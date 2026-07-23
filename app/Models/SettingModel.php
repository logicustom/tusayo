<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';

    protected $allowedFields = [
        'site_name',
        'site_logo',
        'address',
        'phone',
        'email',
        'facebook',
        'instagram',
        'youtube',
        'whatsapp'
    ];
}