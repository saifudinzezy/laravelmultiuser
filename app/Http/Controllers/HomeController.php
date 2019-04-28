<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //membuat midleware sebagai penyaringan bagi yang sudah login
    public function __construct()
    {
        //middleware utk user yang sudah login
        $this->middleware('auth');
    }

    //jadi hanya org yang sudah login yang bisa mengakses halaman ini
    public function home(){
        return view('welcome');
    }
}
