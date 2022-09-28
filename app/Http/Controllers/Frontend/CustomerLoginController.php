<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Customer;

class CustomerLoginController extends Controller
{
    //
    public function login(){
        return view('frontend.login', ['title'=>'Đăng nhập']);
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
        if(Auth::guard('customer')->attempt($data, $request->input('remember')))
            return redirect('/');
        else
            return redirect('/login')->with('success','Đăng nhập thất bại');
    }
    public function logout(){
        Auth::guard('customer')->logout();
        //Cart::destroy();
        return redirect('/');
    }

    public function register(){
        return view('frontend.register');
    }

    public function doRegister(Request $request){
        // $validated = $request->validate([
        //     'email'=> 'required|unique:hongocquynhcustomers,email',
        // ]);
        $customer = new Customer();
        $customer->customerName = $request->customerName;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email =$request->email;
        $pass = bcrypt($request->password);
        $customer->password = $pass;
        $customer->save();
        return response('dang ki thanh cong');
            // if($pass == $repass){
            //     DB::insert('insert into hongocquynhcustomers (customerName, address, phone, email, password) values (?, ?, ?, ?, ?)', [$customerName, $address, $phone, $email,  bcrypt($pass)]);
            //     return redirect()->back()->with('message','Đăng kí thành công');
            // }
            // else{
            //     return redirect('register')->with('message', 'Mật khẩu nhập lại chưa chính xác');
            // }



        // $output ='';
        // if($request->ajax()){
            
        //     $customerName = $request->customerName;
        //     $address = $request->address;
        //     $phone = $request->phone;
        //     $email =$request->email;
        //     $pass = $request->password;
        //     DB::insert('insert into hongocquynhcustomers (customerName, address, phone, email, password) values (?, ?, ?, ?, ?)', [$customerName, $address, $phone, $email,  bcrypt($pass)]);
        //     $output = 'dang ki thanh cong';
        //     return response($output);
        // }
        // return view('frontend.register');
        
    }
}
