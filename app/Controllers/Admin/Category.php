<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();

        $data['categories'] = $model
            ->orderBy('id','ASC')
            ->findAll();

        return view(
            'admin/pages/category',
            $data
        );
    }

    public function add()
    {
        $model = new CategoryModel();

        return view(
            'admin/pages/category_add',
            [
                'parents' => $model->findAll()
            ]
        );
    }

    public function save()
    {
        $model = new CategoryModel();

        $image = $this->request->getFile('image');

        $imageName = '';

        if($image && $image->isValid())
        {
            $imageName = $image->getRandomName();

            $image->move(
                FCPATH.'public/assets/img/categories',
                $imageName
            );
        }

        $model->save([

            'parent_id' => $this->request->getPost('parent_id'),

            'name' => $this->request->getPost('name'),

            'slug' => url_title(
                $this->request->getPost('name'),
                '-',
                true
            ),

            'image' => $imageName,

            'status' => $this->request->getPost('status')
        ]);

        return redirect()
            ->to('admin/category')
            ->with('success','Data berhasil disimpan');
    }

    public function edit($id)
    {
        $model = new CategoryModel();

        $data = [
            'category' => $model->find($id),
            'parents'  => $model
                            ->where('id !=', $id)
                            ->findAll()
        ];

        return view(
            'admin/pages/category_edit',
            $data
        );
    }

    public function update($id){
        $model = new CategoryModel();
        $category = $model->find($id);
        $image = $this->request->getFile('image');

        $imageName = $category['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {

            $imageName = $image->getRandomName();

            $image->move(
                FCPATH . 'public/assets/img/categories',
                $imageName
            );

            if (
                !empty($category['image']) &&
                file_exists(
                    FCPATH . 'public/assets/img/categories/' . $category['image']
                )
            ) {
                unlink(
                    FCPATH . 'public/assets/img/categories/' . $category['image']
                );
            }
        }

        $model->update($id, [

            'parent_id' => $this->request->getPost('parent_id'),

            'name' => $this->request->getPost('name'),

            'slug' => url_title(
                $this->request->getPost('name'),
                '-',
                true
            ),

            'image' => $imageName,

            'status' => $this->request->getPost('status')
        ]);

        return redirect()
            ->to(base_url('admin/category'))
            ->with('success', 'Category berhasil diupdate');
    }

    public function deactivate($id)
    {
        $model = new CategoryModel();

        $model->update($id, [
            'status' => 0
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Kategori berhasil dinonaktifkan'
            );
    }

    public function activate($id)
    {
        $model = new CategoryModel();

        $model->update($id, [
            'status' => 1
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Kategori berhasil diaktifkan'
            );
    }

}