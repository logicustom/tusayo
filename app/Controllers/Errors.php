<?php

namespace App\Controllers;

class Errors extends BaseController
{
    public function page404()
    {
        return view('errors/html/error_404');
    }
}