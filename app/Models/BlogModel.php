<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';

    protected $allowedFields = [
        'title',
        'slug',
        'image',
        'description',
        'views',
        'status',
        'created_at',
        'created_us',
        'updated_at',
        'updated_us'
    ];

    protected $useTimestamps = true;


    /**
     * Semua status aktif
     */
    public function getActiveStatus()
    {
        return $this->where('status', 1)
                    ->orderBy('title', 'ASC')
                    ->findAll();
    }

}