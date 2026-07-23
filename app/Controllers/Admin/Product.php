<?php

namespace App\Controllers\Admin;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController{

    protected $product;

    public function __construct(){
        $this->product  = new ProductModel();
        $this->Category = new CategoryModel();
    }

    public function getData(){
        $model = new \App\Models\ProductModel();
        return $this->response->setJSON(
            $model->findAll()
        ); 
    }

    public function index(){
        $user = session()->get('jwt_user');
        $data = [
            'email'   => $user->email,
            'product' => $this->product->findAll()
        ];
        return view('admin/pages/product', $data);
    }

    public function add(){
        $user          = session()->get('jwt_user');
        $categoryModel = new CategoryModel();
        $data = [
            'email' => $user->email,
            'categories' => $categoryModel
                            ->where('status',1)
                            ->findAll()
        ];
        return view('admin/pages/product_add', $data);
    }

    public function save(){
        $user = session()->get('jwt_user');
        if(!$user){
            return redirect()->to('admin');
        }

        $rules = [
            'name' => [
                'rules' => 'required|is_unique[products.name]',
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
            ROOTPATH . 'public/assets/img/product',
            $namaImage
        );

        $category = $this->Category->find(
            $this->request->getPost('category_id')
        );

        $lastProduct = $this->product
            ->orderBy('id', 'DESC')
            ->first();

        $nextId = ($lastProduct['id'] ?? 0) + 1;

        $prefix = strtoupper(
            substr($category['name'], 0, 3)
        );

        $sku = $prefix . '-' .
            str_pad($nextId , 5, '0', STR_PAD_LEFT);

        $this->product->insert([
            'category_id' => $this->request->getPost('category_id'),
            'sku'         => $sku,
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title(
                                $this->request->getPost('name'),
                                '-',
                                true
                            ),
            'description' => $this->request->getPost('description'),        
            'price'       => $this->request->getPost('price'),
            'weight'      => $this->request->getPost('weight'),
            'stock'       => $this->request->getPost('stock'),
            'image'       => $namaImage,
            'discount'    => $this->request->getPost('discount'),
            'status'      => "Aktif",
            'created_us'  => session()->get('jwt_name')
        ]);

        return redirect()->to('admin/product')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $data['product']    = $this->product->find($id);
        $data['categories'] = $this->Category->where('status',1)->findAll();

        if (!$data['product']) {
            return redirect()->to('/product')
                ->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pages/product_edit', $data);
    }

    public function update($id){
        $product = $this->product->find($id);

        if (!$product) {
            return redirect()->to('/product')
                ->with('error', 'Data tidak ditemukan');
        }

        $category = $this->Category->find(
            $this->request->getPost('category_id')
        );

        $lastProduct = $this->product
            ->orderBy('id', 'DESC')
            ->first();

        $nextId = ($lastProduct['id'] ?? 0) + 1;

        $prefix = strtoupper(
            substr($category['name'], 0, 3)
        );

        $sku = $prefix . '-' .
            str_pad($nextId , 5, '0', STR_PAD_LEFT);

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

        $namaImage = $product['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {

            if (
                !empty($product['image']) &&
                file_exists(ROOTPATH . 'public/assets/img/product/' . $product['image'])
            ) {
                unlink(ROOTPATH . 'public/assets/img/product/' . $product['image']);
            }

            $namaImage = $image->getRandomName();

            $image->move(
                ROOTPATH . 'public/assets/img/product/',
                $namaImage
            );
        }

        $this->product->update($id, [
            'category_id' => $this->request->getPost('category_id'),
            'sku'         => $sku,
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title(
                                $this->request->getPost('name'),
                                '-',
                                true
                            ),
            'description' => $this->request->getPost('description'),  
            'image'       => $namaImage,      
            'price'       => $this->request->getPost('price'),
            'weight'      => $this->request->getPost('weight'),
            'stock'       => $this->request->getPost('stock'),
            'status'      => $this->request->getPost('status'),
            'updated_us'  => session()->get('jwt_name')
        ]);

        return redirect()->to('admin/product')
            ->with('success', 'Data berhasil diupdate');
    }

}