<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ShippingAddressModel;

class Payment extends BaseController{

    public function index($id){
        if (!session()->get('logged_in')) {
            return redirect()->to('google/login');
        }

        $orderModel     = new OrderModel();
        $shippingModel  = new ShippingAddressModel();
        $detailModel    = new OrderDetailModel();
        $order          = $orderModel->find($id);
        $shipping       = $shippingModel
                            ->where('order_id', $order['id'])
                            ->first();
        $details        = $detailModel
                            ->where('order_id', $order['id'])
                             ->findAll();
        $itemDetails    = [];
        foreach ($details as $item) {
            $itemDetails[] = [
                'id'       => $item['product_id'],
                'price'    => (int)$item['product_price'],
                'quantity' => (int)$item['qty'],
                'name'     => $item['product_name']
            ];
        }

        if(!empty($order['snap_token'])) {
            $snapToken = $order['snap_token'];
        }else{
            $config = config('Midtrans');

            \Midtrans\Config::$serverKey = $config->serverKey;
            \Midtrans\Config::$isProduction = $config->isProduction;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [

                'transaction_details' => [
                    'order_id'     => $order['invoice'],
                    'gross_amount' => (int)$order['grand_total']
                ],

                'customer_details' => [
                    'first_name' => $shipping['customer_name'],
                    'email'      => $shipping['email'],
                    'phone'      => $shipping['phone']
                ],

                'item_details' => $itemDetails,

                'shipping_address' => [
                    'first_name'  => $shipping['customer_name'],
                    'phone'       => $shipping['phone'],
                    'address'     => $shipping['address'],
                    'city'        => $shipping['city'],
                    'postal_code' => $shipping['postal_code'],
                    'country_code'=> 'IDN'
                ]

            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $orderModel->update($id, [
                'snap_token' => $snapToken,
                'snap_created_at' => date('Y-m-d H:i:s')
            ]);

            return view('pages/payment', [
                'active'    => 'active',
                'order'     => $order,
                'snapToken' => $snapToken,
                'clientKey' => $config->clientKey,
                'setting'   => $this->setting
            ]);
        }
    }

    public function detail($invoice){
        if (!session()->get('logged_in')) {
            return redirect()->to('google/login');
        }

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

        return view('pages/order/detail', [
            'order'   => $order,
            'details' => $details
        ]);
    }

    public function notification(){
    try {

        $config = config('Midtrans');

        \Midtrans\Config::$serverKey = $config->serverKey;
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $orderId     = $notif->order_id;

        $orderModel = new OrderModel();

        $order = $orderModel
            ->where('invoice', $orderId)
            ->first();

        if (!$order) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Order tidak ditemukan'
            ]);
        }

        if ($transaction == 'settlement' || $transaction == 'capture') {

            $orderModel->update($order['id'], [
                'payment_status' => 'paid',
                'order_status'   => 'processed'
            ]);
        }

        return $this->response->setJSON([
            'status' => true
        ]);

    } catch (\Throwable $e) {

        log_message('error', 'MIDTRANS ERROR: '.$e->getMessage());

        return $this->response->setJSON([
            'error' => $e->getMessage()
        ]);
    }
}

public function notification2()
{
    try {

        log_message('error', 'CALLBACK MASUK');

        $notif = new \Midtrans\Notification();

        log_message('error', 'ORDER ID: '.$notif->order_id);

        return $this->response->setJSON([
            'status' => 'ok'
        ]);

    } catch (\Throwable $e) {

        log_message('error', 'MIDTRANS ERROR: '.$e->getMessage());

        return $this->response->setJSON([
            'error' => $e->getMessage()
        ]);
    }
}

}