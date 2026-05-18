<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\Service2Controller;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SiteStatisticController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\admin\AboutFeatureController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AdminProfileController;
// URL SHOP
use App\Http\Controllers\Shop\HomeController as ShopHomeController;
use App\Http\Controllers\shop\AboutController as ShopAboutController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\ContactController as ShopContactController;
use App\Http\Controllers\Shop\ShopController;


// --- Bagian Admin Proyek Kamu ---

// Route::get('/', function () {
//     return view('admin.layouts.master');
// });

// --- AUTENTIKASI ---
Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER
Route::get('register', [LoginController::class, 'showRegister'])->name('register');
Route::post('register', [LoginController::class, 'registerStore'])->name('register.post');
Route::get('admin/register', [LoginController::class, 'showAdminRegister'])->name('admin.register');
Route::post('admin/register', [LoginController::class, 'adminRegisterStore'])->name('admin.register.post');

Route::middleware('auth')->group(function () {

    // Semua route admin di sini
    Route::middleware('can:is-admin')->prefix('admin')->group(function () {
        // 1. Route Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
        Route::post('/admins', [AdminProfileController::class, 'store'])->name('admin.admins.store');
        Route::patch('/admins/{user}/approve', [AdminProfileController::class, 'approve'])->name('admin.admins.approve');
        Route::patch('/admins/{user}/reject', [AdminProfileController::class, 'reject'])->name('admin.admins.reject');

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

        //Route Service2
        Route::get('/service2', [Service2Controller::class, 'index'])->name('admin.service2');
        Route::post('/service2/store', [Service2Controller::class, 'store'])->name('admin.service2.store');
        Route::put('/service2/update/{id}', [Service2Controller::class, 'update'])->name('admin.service2.update');
        Route::delete('/service2/delete/{id}', [Service2Controller::class, 'destroy'])->name('admin.service2.delete');

        //Route Fitur About
        Route::get('/about', [AboutController::class, 'index'])->name('admin.about');
        Route::put('/admin/about/update/{id}', [AboutController::class, 'update'])->name('admin.about.update');

        //Route Fitur About Feature
        Route::post('/about/feature/store', [AboutFeatureController::class, 'store'])->name('admin.about-feature.store');
        Route::delete('/about/feature/delete/{id}', [AboutFeatureController::class, 'destroy'])->name('admin.about-feature.delete');
        Route::put('/admin/about-feature/update/{id}', [AboutFeatureController::class, 'update'])->name('admin.about-feature.update');

        //Route Fitur Book
        Route::get('/books', [BooksController::class, 'index'])->name('admin.books');
        Route::post('/books/store', [BooksController::class, 'store'])->name('admin.books.store');
        Route::put('/books/update/{id}', [BooksController::class, 'update'])->name('admin.books.update');
        Route::delete('/books/delete/{id}', [BooksController::class, 'destroy'])->name('admin.books.delete');

        //Route Fitur Category
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');

        //Route Contact
        Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact');
        Route::get('/contact/read/{id}', [ContactController::class, 'markAsRead'])->name('admin.contact.read');
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

        //Route Banner
        Route::get('/banner', [BannerController::class, 'index'])->name('admin.banner');
        Route::post('/banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
        Route::put('/banner/update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
        Route::delete('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('admin.banner.delete');

        //Route testimoni
        Route::get('/testimoni', [TestimoniController::class, 'index'])->name('admin.testimoni');
        Route::post('/testimoni/store', [TestimoniController::class, 'store'])->name('admin.testimoni.store');
        Route::delete('/testimoni/delete/{id}', [TestimoniController::class, 'destroy'])->name('admin.testimoni.delete');
    });

    // Route Cart untuk Pengunjung
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});



// --- PENGUNJUNG (Public) ---
Route::get('/', [ShopHomeController::class, 'index'])->name('home');

//Service Pengunjung
Route::get('/service2', [ShopHomeController::class, 'service2'])->name('service2');


//About Pengunjung
Route::get('/about', [ShopAboutController::class, 'index'])->name('about');

Route::get('/contact', [ShopContactController::class, 'index'])->name('contact');
Route::post('/contact', [ShopContactController::class, 'store'])->name('contact.store');


Route::get('/shopdetail/{id}', [ShopHomeController::class, 'detail'])->name('shopdetail');


Route::get('tobukel/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('tobukel/shop/filter/{id?}', [ShopHomeController::class, 'filter'])
    ->name('shop.filter');
