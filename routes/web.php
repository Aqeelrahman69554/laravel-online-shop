<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SiteStatisticController;
use App\Http\Controllers\Admin\TestimoniController;

use App\Http\Controllers\Auth\LoginController;


// --- Bagian Admin Proyek Kamu ---

// Route::get('/', function () {
//     return view('admin.layouts.master');
// });

//Route Login
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    // Semua route admin di sini
    Route::middleware('can:is-admin')->prefix('admin')->group(function () {
        // 1. Route Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // 2. Route Halaman Utama (Home)
        // Menampilkan Tabel
        Route::get('/home', [HomeController::class, 'index'])->name('admin.home.index');

        // Proses Tambah Data
        Route::post('/home/store', [HomeController::class, 'store'])->name('admin.home.store');

        // Proses Update Data (Butuh ID)
        Route::put('/home/update/{id}', [HomeController::class, 'update'])->name('admin.home.update');

        // Proses Hapus Data (Butuh ID)
        Route::delete('/home/delete/{id}', [HomeController::class, 'destroy'])->name('admin.home.delete');


        // Route Fitur Service
        Route::get('/service', [ServiceController::class, 'index'])->name('admin.service');
        Route::post('/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
        Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::delete('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('admin.service.delete');

        //Route Fitur Book
        Route::get('/books', [BooksController::class, 'index'])->name('admin.books');
        Route::post('/books/store', [BooksController::class, 'store'])->name('admin.books.store');
        Route::put('/books/update/{id}', [BooksController::class, 'update'])->name('admin.books.update');
        Route::delete('/books/delete/{id}', [BooksController::class, 'destroy'])->name('admin.books.delete');


        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');

        //Route Contact
        Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact');
        Route::post('/contact/reply/{id}', [ContactController::class, 'reply'])->name('admin.contact.reply');
        Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('admin.contact.delete');

        //Route Orders
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
        Route::patch('/orders/status/{id}', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
        Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('admin.orders.delete');

        //Route Site Statistics
        Route::get('/statistics', [SiteStatisticController::class, 'index'])->name('admin.statistics');
        Route::post('/statistics/store', [SiteStatisticController::class, 'store'])->name('admin.statistics.store');
        Route::put('/statistics/update/{id}', [SiteStatisticController::class, 'update'])->name('admin.statistics.update');
        Route::delete('/statistics/delete/{id}', [SiteStatisticController::class, 'destroy'])->name('admin.statistics.delete');

        //Route testimoni
        Route::get('/testimoni', [TestimoniController::class, 'index'])->name('admin.testimoni');
        Route::post('/testimoni/store', [TestimoniController::class, 'store'])->name('admin.testimoni.store');
        Route::delete('/testimoni/delete/{id}', [TestimoniController::class, 'destroy'])->name('admin.testimoni.delete');
    });
});



// Pengunjung
