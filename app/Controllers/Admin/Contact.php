<?php

namespace App\Controllers\Admin;
use App\Models\ContactModel;

class Contact extends BaseController{

    protected $contact;

    public function __construct(){
        $this->contact = new ContactModel();
    }

    public function getData(){
        $model = new \App\Models\ContactModel();
        return $this->response->setJSON(
            $model->findAll()
        ); 
    }

    public function index(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }
        $data = [
            'email' => $user->email,
            'contact' => $this->contact->findAll()
        ];
        return view('admin/pages/contact', $data);
    }

    public function add(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }

        $data = [
            'email' => $user->email
        ];
        return view('admin/pages/contact_add', $data);
    }

    public function save(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }

        $rules = [
            'email' => [
                'rules' => 'required|is_unique[contact.email]',
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'is_unique' => 'Email sudah digunakan'
                ]
            ],
            'no_tlp' => [
                'rules' => 'required|is_unique[contact.no_tlp]',
                'errors' => [
                    'required'  => 'No Tlp wajib diisi',
                    'is_unique' => 'No Tlp sudah digunakan'
                ]
            ],
            'alamat' => [
                
                'rules' => 'required|min_length[30]',
                'errors' => [
                    'required'   => 'Alamat wajib diisi',
                    'min_length' => 'Alamat minimal 30 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $this->contact->insert([
            'email'  => $this->request->getPost('email'),
            'no_tlp' => $this->request->getPost('no_tlp'),
            'alamat' => $this->request->getPost('alamat'),
            'lat'    => $this->request->getPost('lat'),
            'long'   => $this->request->getPost('long')
        ]);

        return redirect()->to('admin/contact')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $data['contact'] = $this->contact->find($id);

        if (!$data['contact']) {
            return redirect()->to('admin/contact')
                ->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pages/contact_edit', $data);
    }

    public function update($id){
        $contact = $this->contact->find($id);

        if (!$contact) {
            return redirect()->to('admin/contact')
                ->with('error', 'Data tidak ditemukan');
        }

        $rules = [
            'email'  => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $this->contact->update($id, [
            'email'  => $this->request->getPost('email'),
            'no_tlp' => $this->request->getPost('no_tlp'),
            'alamat' => $this->request->getPost('alamat'),
            'lat'    => $this->request->getPost('lat'),
            'long'   => $this->request->getPost('long')
        ]);

        return redirect()->to('admin/contact')
            ->with('success', 'Data berhasil diupdate');
    }

}