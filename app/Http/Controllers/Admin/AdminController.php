<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin\Admin;


class AdminController extends Controller
{
    public function index()
    {   
        $this->middleware('adminauth:admin'); 
        return view('Admin.auth.login', ['url' => 'admin']);

    }
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        $credentials = $request->except(['_token']);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            auth()->attempt($credentials);
            return redirect()->intended('Admin/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showAdminLoginForm()
    {
       
        return view('Admin.auth.register', ['url' => 'admin']);
    }

    protected function createAdmin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login');
    }
    public function logout()
    {
       
       $test= Auth::guard('admin')->logout();
     Auth::guard('admin')->check();


        return redirect()->route('login');
    }
}
