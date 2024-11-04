<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
    function about()
    {
        return view('pages/about');
    }
    function contact()
    {
        return view('pages/contact');
    }
    function register()
    {
        return view('pages/register');
    }
}
