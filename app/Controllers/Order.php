<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;

class Order extends BaseController{

    public function index(){
        if (!session()->get('logged_in')) {
            return redirect()->to('google/login');
        }
        $userId             = session()->get('user_id');
        $orderModel         = new OrderModel();

        $data['active']     = 'order'; 
        $data['orders']     = $orderModel
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->findAll();
        $data['setting']    = $this->setting;    

        return view('pages/order', $data);
    }

    public function detail($invoice)
    {
        $orderModel = new OrderModel();

        $order = $orderModel
            ->where('invoice', $invoice)
            ->where('user_id', session('user_id'))
            ->first();

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $detailModel = new OrderDetailModel();

        $details = $detailModel
            ->where('order_id', $order['id'])
            ->findAll();

        return view('pages/detail_order', [
            'active'  => 'order', 
            'order'   => $order,
            'details' => $details,
            'setting' => $this->setting
        ]);
    }

    public function success($invoice)
    {
        $orderModel = new OrderModel();
        $detailModel = new OrderDetailModel();

        $order = $orderModel
                    ->where('invoice', $invoice)
                    ->first();

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $details = $detailModel
                    ->where('order_id', $order['id'])
                    ->findAll();

        // hapus cart jika sudah dibayar
        if ($order['payment_status'] == 'paid') {
            session()->remove('cart');
        }

        return view('pages/order_success', [
            'title'   => 'Order Success',
            'order'   => $order,
            'details' => $details
        ]);
    }
}