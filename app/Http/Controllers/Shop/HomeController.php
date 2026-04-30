<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data slider dari tabel home
        $sliders = DB::table('home')->get();
        $services = DB::table('service')->get();

        //ambil categroi
        $categories = DB::table('categories')->get();

        //query buku
        $query = DB::table('books');

        // filter kategori (INI KUNCINYA)
        if ($request->get('category')) {
            $query->where('category_id', $request->get('category'));
        }

        $books = $query->paginate(6);

        // Mengirim data ke view master
        return view('shop.pages.home', compact('sliders', 'services', 'books', 'categories'));
    }

    public function detail($id)
    {
        $book = DB::table('books')->where('id', $id)->first();

        if (!$book) {
            abort(404);
        }

        return view('shop.pages.shopdetail', compact('book'));
    }
}
