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

        if ($request->filled('search')) {
            $keyword = $request->search;

            $books->where(function ($query) use ($keyword) {
                $query->where('books_name', 'like', '%' . $keyword . '%')
                    ->orWhere('books_author', 'like', '%' . $keyword . '%')
                    ->orWhere('books_desc', 'like', '%' . $keyword . '%')
                    ->orWhereIn('category_id', function ($categoryQuery) use ($keyword) {
                        $categoryQuery->select('id')
                            ->from('categories')
                            ->where('name', 'like', '%' . $keyword . '%');
                    });
            });
        }

        $books = $books->paginate(8);

        if ($request->ajax()) {
            return view('shop.partials.shop-product-list', compact('books'))->render();
        }

        return view('shop.pages.shop', compact('books', 'categories'));
    }
}
