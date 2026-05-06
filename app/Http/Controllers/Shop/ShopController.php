<?php

namespace App\Http\Controllers\Shop;


use App\Http\Controllers\Controller;
use 

class ShopController extends Controller
{
    public function index()
    {
        $books = DB::table('books')->paginate(8);
        return view('shop.pages.shop', compact('books'));
    }
}
