<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    //membuat middleware
    public function __construct()
    {
        //hanya untk org yang belum punya akun / guest
        $this->middleware('guest');
    }

    public function getRegister(){
        return view('register.fomRegister');
    }

    //fun utk register
    public function postRegister(){
        $user = new User();
        $user->username = Input::get('username');
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        //encripsi password supaya tidak di ketahui
        $user->password = bcrypt(Input::get('password'));
        //ambil nilai id role yang pertama sesuai kondisi yaitu user
        $user->roles_id = DB::table('roles')->select('id')->where('namaRule', 'user')->first()
            ->id;

        //test
//        dd($user);
        $user->save();
    }
}
