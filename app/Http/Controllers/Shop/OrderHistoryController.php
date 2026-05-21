<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mengambil data orders milik user yang login
        $orders = DB::table('orders')
            ->where('user_id', $userId)
            ->orderBy('order_date', 'desc')
            ->get();

        // Kita kelola items untuk setiap order agar bisa tampil di View
        foreach ($orders as $order) {
            $order->items = DB::table('orders_items')
                ->join('books', 'orders_items.book_id', '=', 'books.id')
                ->where('orders_items.order_id', $order->id)
                ->select('orders_items.*', 'books.books_name', 'books.books_images')
                ->get();
        }

        return view('shop.pages.order_history', compact('orders'));
    }
}
