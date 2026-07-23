<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Cart extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Shopping Cart',
            'active'  => 'order',
            'cart'    => session()->get('cart') ?? [],
            'setting' => $this->setting
        ];

        return view('pages/cart', $data);
    }

    public function addajax(){
        $cart = session()->get('cart') ?? [];
        $id   = $this->request->getPost('id');

        if(isset($cart[$id]))
        {
            $cart[$id]['qty']++;
        }
        else
        {
            $cart[$id] = [
                'id'    => $id,
                'name'  => $this->request->getPost('name'),
                'price' => $this->request->getPost('price'),
                'qty'   => 1
            ];
        }

        session()->set('cart', $cart);

        $count = 0;

        foreach($cart as $item)
        {
            $count += $item['qty'];
        }

        return $this->response->setJSON([
            'status' => true,
            'count'  => $count
        ]);
    }

    public function update()
    {
        $cart = session()->get('cart') ?? [];

        $qty = $this->request->getPost('qty');

        foreach ($qty as $id => $value) {

            if(isset($cart[$id])){

                if($value <= 0){
                    unset($cart[$id]);
                }else{
                    $cart[$id]['qty'] = $value;
                }

            }
        }

        session()->set('cart', $cart);

        return redirect()->to('/cart')
                        ->with('success', 'Cart berhasil diperbarui');
    }

    public function remove($id)
    {
        $cart = session()->get('cart') ?? [];

        if(isset($cart[$id])){
            unset($cart[$id]);
        }

        session()->set('cart', $cart);

        return redirect()->to('/cart')
                        ->with('success', 'Produk dihapus');
    }


}