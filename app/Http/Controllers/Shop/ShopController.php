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
        $books = DB::table('books')->paginate(8);
        $categories = DB::table('categories')->get();
        return view('shop.pages.shop', compact('books', 'categories'));
    }

    public function shop(Request $request)
    {
        $categories = DB::table('categories')->get();

        $books = DB::table('books');

        // FILTER CATEGORY
        if ($request->category) {
            $books->where('category_id', $request->category);
        }

        $books = $books->paginate(8);

        return view('shop.pages.shop', compact('books', 'categories'));
    }
}
