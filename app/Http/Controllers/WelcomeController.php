<?php

namespace App\Http\Controllers;

use App\Product;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::whereHas('category', function ($query) {
            $query->where('title', 'Bicycles');
        })->with('assets')->paginate(8);

        $articles = Article::where('active', 'PUBLISHED')->with('assets')->paginate(8);

        return [
            'bicycles' => $products,
            'articles' => $articles
        ];
    }
}
