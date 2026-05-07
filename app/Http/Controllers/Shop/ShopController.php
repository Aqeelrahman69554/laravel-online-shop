<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; // Tambahkan ini
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel books
        $books = DB::table('books')->paginate(9);
        return view('shop.pages.shop', compact('books'));
    }
}
