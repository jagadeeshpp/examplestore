<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    public function __construct()
        {
            
           $this->middleware('adminauth:admin');
            
        }

    public function index()
    {    
      
      $user = Auth::guard('admin')->user();
      
      print_r($user);
        //return "home";

    }
}
