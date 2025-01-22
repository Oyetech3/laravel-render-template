<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.userpage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect']);
route::get('/', [HomeController::class, 'index']);
route::get('/collections', [HomeController::class, 'collections']);
route::post('/liked_product/{id}', [HomeController::class, 'liked_product']);
route::post('/add_to_cart/{id}', [HomeController::class, 'add_to_cart']);


route::get('/admindashboard', [AdminController::class, 'admindashboard']);
route::get('/collection', [AdminController::class, 'collection']);
route::post('/add_collection', [AdminController::class, 'add_collection']);
route::get('/cards', [AdminController::class, 'cards']);
route::get('/charts', [AdminController::class, 'charts']);
route::get('/tables', [AdminController::class, 'tables']);
route::get('/add_products', [AdminController::class, 'add_products']);
route::post('/add_product', [AdminController::class, 'add_product']);
route::get('/view_products', [AdminController::class, 'view_products']);
route::get('/delete_collection/{id}', [AdminController::class, 'delete_collection']);
route::get('/delete_product/{id}',[AdminController::class, 'delete_product']);
route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
route::post('/confirm_edit/{id}', [AdminController::class, 'confirm_edit']);

