<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function show(){
       
        return view('login',['title'=>'Login']);
    }
    public function loginAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('main');// để đến trang khi login vào
        }

        return back()->withErrors([
            'email' => 'Email nhập không chính xác vui lòng đăng nhập lại!',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function index(){
        return view('taikhoan.login');
    }
}
