<?php

namespace App\Controllers\Admin;
use App\Models\ClientModel;

class Client extends BaseController{

    protected $client;

    public function __construct(){
        $this->client = new ClientModel();
    }

    public function getData(){
        $model = new \App\Models\ClientModel();
        return $this->response->setJSON(
            $model->findAll()
        ); 
    }

    public function index(){
        $user = session()->get('jwt_user');
        $data = [
            'email' => $user->email,
            'client' => $this->client->findAll()
        ];
        return view('admin/pages/client', $data);
    }

    public function add(){
        $user = session()->get('jwt_user');

        $data = [
            'email' => $user->email
        ];
        return view('admin/pages/client_add', $data);
    }

    public function save(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }

        $rules = [
            'name' => [
                'rules'  => 'required|is_unique[client.name]',
                'errors' => [
                    'required' => 'Name wajib diisi',
                    'is_unique' => 'Name sudah digunakan'
                   
                ]
            ],
            'position' => [
              'rules'  => 'required',
                'errors' => [
                    'required' => 'Position wajib diisi'
                ]
            ],
            'testimonials' => [
                'rules'  => 'required|min_length[30]',
                'errors' => [
                    'required' => 'Testimonials wajib diisi',
                    'min_length' => 'Testimonials minimal 30 karakter'
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

        $this->client->insert([
            'name'         => $this->request->getPost('name'),
            'position'     => $this->request->getPost('position'),
            'testimonials' => $this->request->getPost('testimonials'),
            'image'        => $namaImage,
            'status'       => "Aktif",
        ]);

        return redirect()->to('admin/client')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $data['client'] = $this->client->find($id);

        if (!$data['client']) {
            return redirect()->to('/client')
                ->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pages/client_edit', $data);
    }

    public function update($id){
        $client = $this->client->find($id);

        if (!$client) {
            return redirect()->to('/client')
                ->with('error', 'Data tidak ditemukan');
        }

        $rules = [
            'name'         => 'required',
            'position'     => 'required',
            'testimonials' => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $image = $this->request->getFile('image');

        $namaImage = $client['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {

            if (
                !empty($client['image']) &&
                file_exists(ROOTPATH . 'public/uploads/' . $client['image'])
            ) {
                unlink(ROOTPATH . 'public/uploads/' . $client['image']);
            }

            $namaImage = $image->getRandomName();

            $image->move(
                ROOTPATH . 'public/uploads',
                $namaImage
            );
        }

        $this->client->update($id, [
            'name'         => $this->request->getPost('name'),
            'position'     => $this->request->getPost('position'),
            'testimonials' => $this->request->getPost('testimonials'),
            'image'        => $namaImage,
            'status'       => $this->request->getPost('status')
        ]);

        return redirect()->to('admin/client')
            ->with('success', 'Data berhasil diupdate');
    }

}