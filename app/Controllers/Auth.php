<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Auth extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function login()
    {
        $productModel = new \App\Models\ProductModel();
        $categoryModel = new \App\Models\CategoryModel();

        $data = [
            'title'      => 'Shop',
            'categories' => $categoryModel->getActiveCategories(),
            'sale'       => $productModel->getSaleProducts(),
            'latest'     => $productModel->getLatestProducts(),
            'products'   => $productModel->paginate(1),
            'pager'      => $productModel->pager,
            'setting'    => $this->setting
        ];

        return view('auth/login2', $data);
    }


}