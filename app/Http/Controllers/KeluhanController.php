<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class KeluhanController extends Controller
{
    
    public function index()
    {
        return view('formulir');
    }

    public function action()
    {
        return 'Keluhan berhasil disimpan';
    }

    public function detail($name)
    {
        return 'Nama anda adalah '.$name;
    }
}
