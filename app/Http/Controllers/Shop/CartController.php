<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menampilkan isi keranjang
    public function index()
    {
        // Mengambil data cart milik user yang sedang login beserta data bukunya
        $carts = Cart::with('book')
            ->where('user_id', Auth::id())
            ->whereHas('book')
            ->get();

        return view('shop.pages.cart', compact('carts'));
    }

    // Menambah buku ke keranjang
    public function add(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $book = Book::findOrFail($id);

        // Cek apakah buku sudah ada di keranjang user tersebut
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('book_id', $id)
            ->first();

        if ($cartItem) {
            // Jika ada, tambah quantity-nya
            $cartItem->increment('quantity', $request->quantity ?? 1);
        } else {
            // Jika belum ada, buat record baru
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $id,
                'quantity' => $request->quantity ?? 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Buku berhasil ditambahkan ke keranjang!');
    }

    // Menghapus item dari keranjang
    public function remove($id)
    {
        $cart = Cart::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $cart->delete();

        return back()->with('success', 'Item berhasil dihapus.');
    }
}
