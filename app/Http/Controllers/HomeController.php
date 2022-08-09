<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function add()
    {
        return view('form');
    }

    public function store()
    {
        return 'phuong thuc post';
    }

    public function edit()
    {
        return 'phuong thuc put';
    }

    public function delete()
    {
        return 'phuong thuc delete';
    }

    public function food($id = null)
    {
        return 'food co id la: '.$id;
    }
}
