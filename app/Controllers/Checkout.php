<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ShippingAddressModel;

class Checkout extends BaseController
{
    public function index(){

        if (!session()->get('logged_in')) {
            return redirect()->to('google/login');
        }

        $cart = session()->get('cart') ?? [];

        if(empty($cart))
        {
            return redirect()->to('/products')
                ->with('error', 'Keranjang masih kosong');
        }

        $subtotal = 0;

        foreach($cart as $item)
        {
            $subtotal += $item['price'] * $item['qty'];
        }

        $data = [
            'title'    => 'Checkout',
            'active'   => 'order',
            'cart'     => $cart,
            'subtotal' => $subtotal,
            'setting'  => $this->setting
        ];

        return view('pages/checkout', $data);
    }

    public function process(){
        $cart = session()->get('cart') ?? [];

        if(empty($cart)){
            return redirect()->to('/cart');
        }

        $orderModel     = new OrderModel();
        $detailModel    = new OrderDetailModel();
        $shippingModel  = new ShippingAddressModel();

        $subtotal = 0;
        foreach($cart as $item){
            $subtotal += ($item['price'] * $item['qty']);
        }

        $shippingCost   = 0;
        $discount       = 0;
        $grandTotal     = $subtotal + $shippingCost - $discount;
        $invoice        = 'INV-' . time();;
        $orderId        = $orderModel->insert([
            'invoice'           => $invoice,
            'user_id'           => session()->get('user_id'),
            'subtotal'          => $subtotal,
            'shipping_cost'     => $shippingCost,
            'discount'          => $discount,
            'grand_total'       => $grandTotal,
            'payment_status'    => 'pending',
            'order_status'      => 'pending',
            'notes'             => $this->request->getPost('notes')
        ]);

        foreach($cart as $item){
            $detailModel->insert([
                'order_id'      => $orderId,
                'product_id'    => $item['id'],
                'product_name'  => $item['name'],
                'product_price' => $item['price'],
                'qty'           => $item['qty'],
                'subtotal'      => $item['price'] * $item['qty']
            ]);
        }

        $shippingModel->insert([
            'order_id'      => $orderId,
            'customer_name' => $this->request->getPost('customer_name'),
            'email'         => $this->request->getPost('email'),
            'phone'         => $this->request->getPost('phone'),
            'address'       => $this->request->getPost('address'),
            'city'          => $this->request->getPost('city'),
            'postal_code'   => $this->request->getPost('postal_code')
        ]);

        return redirect()->to('/payment/'.$orderId);
    }
}