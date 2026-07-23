<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'category_id',
        'sku',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'sold',
        'weight',
        'image',
        'discount',
        'status',
        'created_us',
        'updated_us'
    ];

    public function getProducts()
    {
        return $this->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->where('products.status', 'publish')
            ->findAll();
    }

    public function getProduct($slug)
    {
        return $this->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->where('products.slug', $slug)
            ->first();
    }

    public function getSaleProducts()
    {
        return $this->where('discount >', 0)
                    ->where('status', 'publish')
                    ->orderBy('discount', 'DESC')
                    ->findAll(6);
    }

    public function getLatestProducts()
    {
        return $this->where('status', 'publish')
                    ->orderBy('id', 'DESC')
                    ->findAll(6);
    }

}