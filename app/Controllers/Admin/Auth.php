<?php

namespace App\Controllers\Admin;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends BaseController{

    public function index(){
        return view('admin/auth/login');
    }

    public function pwd(){
        echo password_hash('!1', PASSWORD_DEFAULT);
    }

    public function login(){
        $db       = \Config\Database::connect();
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $db->table('users')
            ->where('email', $email)
            ->get()
            ->getRow();

        if(!$user){
            $this->response->setJSON([
                'status' => false,
                'message' => 'Email tidak ditemukan'
            ]);
            return redirect()->back()
            ->withInput()
            ->with('error', 'Email tidak ditemukan');
        }

        if(!password_verify($password, $user->password)){
            $this->response->setJSON([
                'status'  => false,
                'message' => 'Password salah'
            ]);
            return redirect()->back()
            ->withInput()
            ->with('error', 'Password salah');
        }

        $payload = [
            'iss'   => base_url(),
            'aud'   => base_url(),
            'iat'   => time(),
            'exp' => time() + 3600,
            'uid'   => $user->id,
            'email' => $user->email,
            'nama'  => $user->name
        ];

        $token = JWT::encode(
            $payload,
            env('JWT_SECRET'),
            'HS256'
        );

        session()->set([
            'jwt_token' => $token,
            'isLogged'  => true,
            'nama'      => $user->name
        ]);

        return redirect()->to('admin/dashboard');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('admin');
    }

}