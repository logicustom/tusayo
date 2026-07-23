<?php

namespace App\Controllers\Admin;
use App\Models\AboutusModel;

class Aboutus extends BaseController{

    protected $about_us;

    public function __construct(){
        $this->about_us = new AboutusModel();
    }

    public function getData(){
        $model = new \App\Models\AboutusModel();
        return $this->response->setJSON(
            $model->findAll()
        ); 
    }

    public function index(){
        $user = session()->get('jwt_user');
        $data = [
            'email' => $user->email,
            'about_us' => $this->about_us->findAll()
        ];
        return view('admin/pages/aboutus', $data);
    }

    public function add(){
        $user = session()->get('jwt_user');

        $data = [
            'email' => $user->email
        ];
        return view('admin/pages/aboutus_add', $data);
    }

    public function save(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }

        $rules = [
            'title' => [
                'rules' => 'required|is_unique[about_us.title]',
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'is_unique' => 'Email sudah digunakan'
                ]
            ],
            'subtitle' => [
                'rules' => 'required|is_unique[about_us.subtitle]',
                'errors' => [
                    'required'  => 'No Tlp wajib diisi',
                    'is_unique' => 'No Tlp sudah digunakan'
                ]
            ],
            'description' => [
                'rules' => 'required|min_length[30]',
                'errors' => [
                    'required'   => 'Description wajib diisi',
                    'min_length' => 'Description minimal 30 karakter'
                ]
            ],
            'vision' => [
                'rules' => 'required|is_unique[about_us.vision]',
                'errors' => [
                    'required'  => 'Vision wajib diisi',
                    'is_unique' => 'Vision sudah digunakan'
                ]
            ],
            'mission' => [
                'rules' => 'required|min_length[30]',
                'errors' => [
                    'required'   => 'Mission wajib diisi',
                    'min_length' => 'Mission minimal 30 karakter'
                ]
            ]

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $this->about_us->insert([
            'title'         => $this->request->getPost('title'),
            'subtitle'      => $this->request->getPost('subtitle'),
            'description'   => $this->request->getPost('description'),
            'vision'        => $this->request->getPost('vision'),
            'mission'       => $this->request->getPost('mission')
        ]);

        return redirect()->to('admin/aboutus')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $data['about_us'] = $this->about_us->find($id);

        if (!$data['about_us']) {
            return redirect()->to('admin/aboutus')
                ->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pages/aboutus_edit', $data);
    }

    public function update($id){
        $about_us = $this->about_us->find($id);

        if (!$about_us) {
            return redirect()->to('admin/aboutus')
                ->with('error', 'Data tidak ditemukan');
        }

        $rules = [
            'title'         => 'required',
            'subtitle'      => 'required',
            'description'   => 'required',
            'vision'        => 'required',
            'mission'       => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $this->about_us->update($id, [
            'title'         => $this->request->getPost('title'),
            'subtitle'      => $this->request->getPost('subtitle'),
            'description'   => $this->request->getPost('description'),
            'vision'        => $this->request->getPost('vision'),
            'mission'       => $this->request->getPost('mission'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/aboutus')
            ->with('success', 'Data berhasil diupdate');
    }

}