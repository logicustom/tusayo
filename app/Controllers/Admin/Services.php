<?php

namespace App\Controllers\Admin;
use App\Models\ServicesModel;

class Services extends BaseController{

    protected $services;

    public function __construct(){
        $this->services = new ServicesModel();
    }

    public function getData(){
        $model = new \App\Models\ServicesModel();
        return $this->response->setJSON(
            $model->findAll()
        ); 
    }

    public function index(){
        $user = session()->get('jwt_user');
        $data = [
            'email' => $user->email,
            'services' => $this->services->findAll()
        ];
        return view('admin/pages/services', $data);
    }

    public function add(){
        $user = session()->get('jwt_user');

        $data = [
            'email' => $user->email
        ];
        return view('admin/pages/services_add', $data);
    }

    public function save(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }

        $rules = [
            'name' => [
                'rules' => 'required|is_unique[services.name]',
                'errors' => [
                    'required' => 'Name wajib diisi',
                    'is_unique' => 'Description sudah digunakan'
                   
                ]
            ],
            'description' => [
                
                'rules' => 'required|min_length[30]',
                'errors' => [
                    'required' => 'Description wajib diisi',
                    'min_length' => 'Description minimal 30 karakter'
                ]
            ],
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'uploaded' => 'Silahkan pilih gambar',
                    'max_size' => 'Ukuran gambar maksimal 2 MB',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'Format gambar harus JPG, JPEG, PNG atau WEBP'
                ]
            ]
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $image = $this->request->getFile('image');

        $namaImage = $image->getRandomName();

        $image->move(
            ROOTPATH . 'public/uploads',
            $namaImage
        );

        $this->services->insert([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image'       => $namaImage,
            'status'      => "Aktif",
        ]);

        return redirect()->to('admin/services')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $data['services'] = $this->services->find($id);

        if (!$data['services']) {
            return redirect()->to('admin/services')
                ->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pages/services_edit', $data);
    }

    public function update($id){
        $services = $this->services->find($id);

        if (!$services) {
            return redirect()->to('/services')
                ->with('error', 'Data tidak ditemukan');
        }

        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $image = $this->request->getFile('image');

        $namaImage = $services['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {

            if (
                !empty($services['image']) &&
                file_exists(ROOTPATH . 'public/uploads/' . $services['image'])
            ) {
                unlink(ROOTPATH . 'public/uploads/' . $services['image']);
            }

            $namaImage = $image->getRandomName();

            $image->move(
                ROOTPATH . 'public/uploads',
                $namaImage
            );
        }

        $this->services->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image'       => $namaImage,
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('admin/services')
            ->with('success', 'Data berhasil diupdate');
    }

}