<?php

namespace App\Http\Controllers;

use App\Product;
use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('admin');
    }
    public function client()
    {
        return view('client');
    }
}
