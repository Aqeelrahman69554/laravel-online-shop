<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Book; // Pastikan model Book sudah ada
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_books' => Book::count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'total_revenue' => Transaction::where('status', 'completed')->sum('total_price'),
            'total_transactions' => Transaction::count(),
            'new_customers' => User::where('role', 'customer')->latest()->take(5)->get(),
            'transactions' => Transaction::latest()->take(10)->get(),
        ];

        return view('admin.pages.dashboard', $data);
    }
}
