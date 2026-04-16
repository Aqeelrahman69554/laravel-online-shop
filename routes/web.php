<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.pages.dashboard');
});




Route::get('/admin/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('admin/pages/dashboard');

Route::get('/admin/home', function () {
    return view('admin.pages.home');
})->name('home');

Route::get('/admin/service', function () {
    return view('admin.pages.service');
})->name('service');

Route::get('admin/books', function () {
    return view('admin.pages.books');
})->name('books');



Route::get('admin/categories', function () {
    return view('admin.pages.categories');
})->name('categories');

Route::get('admin/contact', function () {
    return view('admin.pages.contact');
})->name('contact');

Route::get('admin/orders', function(){
    return view('admin.pages.orders');
})->name('orders');

Route::get('admin/sitestatistic', function(){
    return view('admin.pages.sitestatistic');
})->name('sitestatistic');


// ROUTE ADMIN (BACKEND)
Route::prefix('admin2')->name('admin2.')->middleware('auth.custom')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // HOME
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
