<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Home extends BaseController{

    protected $productModel;
    protected $categoryModel;

    public function __construct(){
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index(){
        $productModel = new \App\Models\ProductModel();
        $categoryModel = new \App\Models\CategoryModel();

        $data = [
            'title'      => 'Home',
            'active'     => 'home',
            'categories' => $categoryModel->getActiveCategories(),
            'latest'     => $productModel->getLatestProducts(),
            'products'   => $productModel->getProducts(),
            'pager'      => $productModel->pager,
            'setting'    => $this->setting
        ];

        return view('pages/home', $data);
    }
    
}