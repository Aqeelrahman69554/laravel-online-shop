<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sliders = DB::table('home')->get();
        $services = DB::table('service')->get();
        $categories = DB::table('categories')->get();
        $statistics = DB::table('site_statistic')->get();
        $testimoni = DB::table('testimoni')->get();

        // 🔥 kalau pilih kategori
        if ($request->category) {
            $books = DB::table('books')
                ->where('category_id', $request->category)
                ->paginate(4);
        } else {
            // 🔥 ALL (ambil 2 buku per kategori)
            $books = collect();

            foreach ($categories as $cat) {
                $data = DB::table('books')
                    ->where('category_id', $cat->id)
                    ->inRandomOrder()
                    ->limit(2)
                    ->get();

                $books = $books->merge($data);
            }

            // 🔥 batasi total 8
            $books = $books->take(4);
        }

        return view('shop.pages.home', compact('sliders', 'services', 'books', 'categories', 'statistics', 'testimoni'));
    }

    public function detail($id)
    {
        $book = DB::table('books')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->select('books.*', 'categories.name as category_name')
            ->where('books.id', $id)
            ->first();

        if (!$book) {
            abort(404);
        }

        return view('shop.pages.shopdetail', compact('book'));
    }

    public function filter($id = null)
    {
        if ($id) {

            $books = Book::where('category_id', $id)->limit(4)->get();
        } else {

            $books = Book::limit(4)->get();
        }

        return view('shop.partials.product-list', compact('books'));
    }
}
