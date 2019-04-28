<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //bikin akses middleware hanya yg sudah login dan admin yang bisa akses halaman ini
    public function __construct()
    {
        //middleware yang sudah login
        $this->middleware('auth');
        //middleware yang memiliki role admin
        $this->middleware('rule:admin');
    }

    public function hapus(){
        return 'ini halaman admin utk delete';
    }

    public function update(){
        return 'ini halaman admin utk update';
    }
}
