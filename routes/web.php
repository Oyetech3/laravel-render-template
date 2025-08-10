<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PaymentController;
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
Route::post('/liked_product/{id}', [HomeController::class, 'liked_product'])->name('liked_product');
route::post('/add_to_cart/{id}', [HomeController::class, 'add_to_cart']);
route::post('/add_to/{id}', [HomeController::class, 'add_to']);
route::get('/liked', [HomeController::class, 'liked']);
route::get('/carts', [HomeController::class, 'carts']);
route::get('/products', [HomeController::class, 'products']);
route::post('/update_quantity/{id}', [HomeController::class, 'update_quantity']);
route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart']);
route::get('/delete_like/{id}', [HomeController::class, 'delete_like']);
route::delete('/delete/{id}', [HomeController::class, 'delete']);
route::get('/services', [HomeController::class, 'services']);
route::get('/contact', [HomeController::class, 'contact']);


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Contact Management
    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'adminShow'])->name('contacts.show');
    Route::patch('/contacts/{contact}', [ContactController::class, 'adminUpdate'])->name('contacts.update');

    // Newsletter Management
    Route::get('/newsletter', [NewsletterController::class, 'adminIndex'])->name('newsletter.index');
    Route::get('/newsletter/export', [NewsletterController::class, 'export'])->name('newsletter.export');
    Route::post('/newsletter/send', [NewsletterController::class, 'adminSend'])->name('newsletter.send');

});


Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::post('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'processUnsubscribe'])->name('newsletter.unsubscribe.process');


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

Route::get('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');

