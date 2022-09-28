<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(){
        return view('admin.login', ['title'=>'Đăng nhập']);
    }

    public function doLogin(Request $request){
        $validated = $request-> validate([
            'email'=> 'required|Email',
            'password'=>'required|min:6'
        ]);
        $data = [
            'email' => $request->input('email'),
            'password'=> $request->input('password'),
        ];
        if(Auth::guard('user')->attempt($data, $request->input('remember')))
            return redirect('admin');
        else
            return redirect('admin/login')->with('success','Đăng nhập thất bại');
    }
    public function logout(){
        Auth::guard('user')->logout();
        return redirect('admin/login');
    }
}
