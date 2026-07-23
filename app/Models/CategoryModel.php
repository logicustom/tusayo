<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'parent_id',
        'name',
        'slug',
        'image',
        'status'
    ];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Semua kategori aktif
     */
    public function getActiveCategories()
    {
        return $this->where('status', 1)
                    ->orderBy('name', 'ASC')
                    ->findAll();
    }

    /**
     * Cari kategori berdasarkan slug
     */
    public function getCategoryBySlug($slug)
    {
        return $this->where('slug', $slug)
                    ->first();
    }

    /**
     * Parent Category
     */
    public function getParentCategories()
    {
        return $this->where('parent_id', null)
                    ->where('status', 1)
                    ->findAll();
    }

    /**
     * Sub Category
     */
    public function getChildCategories($parentId)
    {
        return $this->where('parent_id', $parentId)
                    ->where('status', 1)
                    ->findAll();
    }

    /**
     * Kategori + jumlah produk
     */
    public function getCategoriesWithProductCount()
    {
        return $this->select('categories.*, COUNT(products.id) as total_product')
                    ->join('products', 'products.category_id = categories.id', 'left')
                    ->groupBy('categories.id')
                    ->findAll();
    }
}