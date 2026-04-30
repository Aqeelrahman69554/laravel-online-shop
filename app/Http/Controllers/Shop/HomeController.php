<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data slider dari tabel home
        $sliders = DB::table('home')->get();

        // Mengirim data ke view master
        return view('shop.pages.home', compact('sliders'));
    }
}
