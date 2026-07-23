<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $productModel = new \App\Models\ProductModel();
        $categoryModel = new \App\Models\CategoryModel();

        $data = [
            'title'      => 'Shop',
            'active'     => 'shop',
            'categories' => $categoryModel->getActiveCategories(),
            'sale'       => $productModel->getSaleProducts(),
            'latest'     => $productModel->getLatestProducts(),
            'products'   => $productModel->paginate(1),
            'pager'      => $productModel->pager,
            'setting'    => $this->setting
        ];

        return view('pages/products', $data);
    }

    public function category($slug)
    {
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        $category = $categoryModel
            ->where('slug', $slug)
            ->first();

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'      => $category['name'],
            'categories' => $categoryModel->getActiveCategories(),
            'products'   => $productModel
                                ->where('category_id', $category['id'])
                                ->paginate(9),
            'pager'      => $productModel->pager,
            'sale'       => $productModel->getSaleProducts(),
            'selected'   => $category['id']
        ];

        return view('pages/products', $data);
    }

}