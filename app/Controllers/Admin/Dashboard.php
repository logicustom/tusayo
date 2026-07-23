<?php

namespace App\Controllers\Admin;

class Dashboard extends BaseController
{

    public function index(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }

        $db      = \Config\Database::connect();

        $message = $db->query("
                                SELECT
                                    DATE_FORMAT(created_at,'%Y-%m') as bulan,
                                    COUNT(*) as total
                                FROM orders
                                GROUP BY DATE_FORMAT(created_at,'%Y-%m')
                                ORDER BY bulan
                            ")->getResultArray();

        $data = [
            'email'      => $user->email,
            'chartDate'  => array_column($message, 'bulan'),
            'chartTotal' => array_column($message, 'total')
        ];

        return view('admin/dashboard/index', $data);
    }
}