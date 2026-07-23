<?php

namespace App\Controllers;

use App\Models\PageModel;

class Page extends BaseController
{
    public function about()
    {
        $page = (new PageModel())
            ->where('slug','tentang-kami')
            ->first();

        return view('pages/page',[
            'active'     => 'active',
            'page'       =>$page,
            'setting'    => $this->setting
        ]);
    }

    public function privacy()
    {
        $page = (new PageModel())
            ->where('slug','kebijakan-privasi')
            ->first();

        return view('pages/page',[
            'page'       =>$page,
            'setting'    => $this->setting
        ]);
    }

    public function terms()
    {
        $page = (new PageModel())
            ->where('slug','syarat-ketentuan')
            ->first();

        return view('pages/page',[
            'page'       =>$page,
            'setting'    => $this->setting
        ]);
    }
}