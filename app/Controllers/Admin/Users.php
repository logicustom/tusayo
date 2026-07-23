<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function index(){
        return view('admin/pages/users');
    }

    public function create(){
        $data = [
            'title' => 'Tambah User'
        ];
        return view('admin/pages/users_add', $data);
    }

    public function getData()
    {
        return $this->response->setJSON(
            $this->users
                ->orderBy('id','DESC')
                ->findAll()
        );
    }

    public function save(){

        $rules = [
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required',
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $result = $this->users->insert([
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'password'   => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role'       => $this->request->getPost('role'),
            'status'     => $this->request->getPost('status'),
            'provider'   => 'local',
            'status'     => 'aktif',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/users')
            ->with('success','User berhasil ditambahkan');
    }

    public function edit($id){
        $data['user'] = $this->users->find($id);

        if (!$data['user']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/pages/users_edit', $data);
    }

    public function update($id){
        $user = $this->users->find($id);
        $emailRule = 'required|valid_email';

        if ($this->request->getPost('email') != $user['email']) {
            $emailRule .= '|is_unique[users.email]';
        }

        $rules = [
            'name'  => 'required|min_length[3]',
            'email' => $emailRule,
            'role'  => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'role'       => $this->request->getPost('role'),
            'status'     => $this->request->getPost('status'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!empty($this->request->getPost('password'))) {
            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $this->users->update($id, $data);

        return redirect()->to('/admin/users')
            ->with('success', 'User berhasil diupdate');
    }


}