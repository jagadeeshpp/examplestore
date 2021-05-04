<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {        
       // $this->middleware('guest:admin')->except('logout');
        
    }

    public function getHome()
    {
        return "ppp";
    }

}
