<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Blogs extends BaseController
{

    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    public function index(){
        $blogModel = new \App\Models\BlogModel();

        $data = [
            'title'      => 'Blogs',
            'active'     => 'blogs',
            'blogs'      => $blogModel->getActiveStatus(),
            'setting'    => $this->setting
        ];

        return view('pages/blogs', $data);
    }

    public function detail($slug)
    {
        $model = new BlogModel();

        $blog = $model
            ->where('slug',$slug)
            ->where('status',1)
            ->first();

        if(!$blog){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // tambah view
        $model->update($blog['id'],[
            'views' => $blog['views'] + 1
        ]);

        $data['blog'] = $blog;

        $data['latestBlogs'] = $model
            ->where('status',1)
            ->where('id !=',$blog['id'])
            ->orderBy('id','DESC')
            ->findAll(5);

        return view('pages/blog/detail',$data);
    }
}