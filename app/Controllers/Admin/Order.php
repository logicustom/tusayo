<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;

class Order extends BaseController
{
    protected $order;
    protected $detail;

    public function __construct()
    {
        $this->order  = new OrderModel();
        $this->detail = new OrderDetailModel();
    }

public function getData()
{
    $db = \Config\Database::connect();

    $search = $this->request->getGet('search');

    // Default hari ini
    $start = $this->request->getGet('start_date') ?: date('Y-m-d');
    $end   = $this->request->getGet('end_date') ?: date('Y-m-d');

    $builder = $db->table('orders o')
        ->select('
            o.*,
            u.name as customer,
            u.email
        ')
        ->join('users u', 'u.id = o.user_id', 'left');

    if (!empty($search)) {
        $builder->groupStart()
            ->like('o.invoice', $search)
            ->orLike('u.name', $search)
            ->orLike('u.email', $search)
            ->groupEnd();
    }

    $builder->where('DATE(o.created_at) >=', $start);
    $builder->where('DATE(o.created_at) <=', $end);

    $data = $builder
        ->orderBy('o.id', 'DESC')
        ->get()
        ->getResultArray();

    return $this->response->setJSON($data);
}

    public function index(){
        $user = session()->get('jwt_user');
        $data = [
            'email' => $user->email,
            'order' => $this->order->findAll()
        ];
        return view('admin/pages/order', $data);
    }

    public function detail($id)
    {
        $data['order'] = $this->order->find($id);

        $data['details'] = $this->detail
            ->where('order_id', $id)
            ->findAll();

        return view('admin/pages/order_detail', $data);
    }



}