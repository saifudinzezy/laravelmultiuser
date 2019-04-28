<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //membuat middleware
    public function __construct()
    {
        //hanya untk org yang belum punya akun / guest
        $this->middleware('guest');
    }

    public function getLogin(){
        return view('login.formLogin');
    }

    //fun utk login
    public function postLogin(Request $request){
        //cek auth dengan fungsi bawaan di laravel
        if (Auth::attempt([
            //cek jika email dan password sama dengan inputan
            'email' => $request->email,
            'password' =>$request->password
            //berarti true
        ])){
            //dan jalankan fungsi ini
            return redirect('/');
        }elseif (Auth::attempt([
            //cek jika username dan password sama dengan inputan
            'username' => $request->email,
            'password' =>$request->password
            //berarti true
        ])){
            //dan jalankan fungsi ini
            return redirect('/');
        }else{
            return 'salah masukin data';
        }
    }
}
