<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return view("index")->with('nom', 'yaya');
    }

    public function about(){
        return view('about');
    }
}
