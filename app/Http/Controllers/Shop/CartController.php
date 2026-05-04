<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add($id)
    {
        $book = DB::table('books')->where('id', $id)->first();

        if (!$book) return back();

        $cart = session()->get('cart', []);

        // kalau sudah ada → tambah qty
        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'name' => $book->books_name,
                'price' => $book->price,
                'image' => $book->books_images,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Berhasil ditambahkan ke cart!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('shop.pages.cart', compact('cart'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return back();
    }
}
