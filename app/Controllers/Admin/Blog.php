<?php

namespace App\Controllers\Admin;
use App\Models\blogModel;

class blog extends BaseController{

    protected $blog;

    public function __construct(){
        $this->blog = new blogModel();
    }

    public function getData(){
        $model = new \App\Models\blogModel();
        return $this->response->setJSON(
            $model->findAll()
        ); 
    }

    public function index(){
        $user = session()->get('jwt_user');
        $data = [
            'email' => $user->email,
            'blog' => $this->blog->findAll()
        ];
        return view('admin/pages/blog', $data);
    }

    public function add(){
        $user = session()->get('jwt_user');

        $data = [
            'email' => $user->email
        ];
        return view('admin/pages/blog_add', $data);
    }

    public function save(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }

        $rules = [
            'name' => [
                'rules' => 'required|is_unique[blogs.title]',
                'errors' => [
                    'required' => 'title wajib diisi',
                    'is_unique' => 'Title sudah digunakan'
                   
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
            ROOTPATH . 'public/assets/img/blog',
            $namaImage
        );

        $this->blog->insert([
            'title'       => $this->request->getPost('name'),
            'slug'        => url_title(
                                $this->request->getPost('name'),
                                '-',
                                true
                            ),
            'description' => $this->request->getPost('description'),
            'image'       => $namaImage,
            'status'      => "Aktif",
        ]);

        return redirect()->to('admin/blog')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $data['blog'] = $this->blog->find($id);

        if (!$data['blog']) {
            return redirect()->to('/blog')
                ->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pages/blog_edit', $data);
    }

    public function update($id){
        $blog = $this->blog->find($id);

        if (!$blog) {
            return redirect()->to('/blog')
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

        $namaImage = $blog['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {

            if (
                !empty($blog['image']) &&
                file_exists(ROOTPATH . 'public/assets/img/blog/' . $blog['image'])
            ) {
                unlink(ROOTPATH . 'public/assets/img/blog/' . $blog['image']);
            }

            $namaImage = $image->getRandomName();

            $image->move(
                ROOTPATH . 'public/assets/img/blog',
                $namaImage
            );
        }

        $this->blog->update($id, [
            'title'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image'       => $namaImage,
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('admin/blog')
            ->with('success', 'Data berhasil diupdate');
    }

}