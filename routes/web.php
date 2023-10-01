<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\UserContrller;
use App\Http\Controllers\Admin\TableContrller;
use App\Http\Controllers\Admin\ReservationContrller;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\FrontEnd\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontEnd\HomeController::class,'index']);
Route::get('/category',[HomeController::class,'categories']);
Route::get('/category/{id}',[HomeController::class,'products']);
Route::get('/menu',[HomeController::class,'menu']);

Route::get('/reservation/create',[HomeController::class,'reservation']);

Route::post('/reservation',[HomeController::class,'store']);

Route::get('/about',[HomeController::class,'about']);

Route::get('/contact',[HomeController::class,'contact']);

Route::get('/loginpage',[HomeController::class,'loginpage']);



Route::get('add-to-cart/{id}', [App\Http\Controllers\FrontEnd\HomeController::class,'addToCart'])->name('add-to-cart');
Route::delete('remove_from_cart', [App\Http\Controllers\FrontEnd\HomeController::class,'remove'])->name('remove_from_cart');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/invoice/{id}',[App\Http\Controllers\Admin\OrderContrller::class , 'invoice'])->name('invoice');


Route::middleware(['auth','is_admin'])->name('admin.')->prefix('admin')->group(function () {

    Route::resource('/about',AboutController::class);
    Route::resource('/user',UserContrller::class);
    Route::resource('/tables',TableContrller::class);
    Route::resource('/reservations',ReservationContrller::class);
    Route::resource('/abouts',AboutController::class);
    Route::resource('/categories',App\Http\Controllers\Admin\CategoryContrller::class);
    Route::resource('/products',App\Http\Controllers\Admin\ProductContrller::class);
    Route::resource('/sliders',App\Http\Controllers\Admin\SliderContrller::class);
    Route::resource('/customers',App\Http\Controllers\Admin\CustomerContrller::class);
    Route::resource('/orders',App\Http\Controllers\Admin\OrderContrller::class);
    
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/confirm',[App\Http\Controllers\FrontEnd\HomeController::class,'confirm'])->name('confirm');
Route::get('/address',[App\Http\Controllers\FrontEnd\HomeController::class,'address'])->name('address');
Route::get('/checkout',[App\Http\Controllers\FrontEnd\HomeController::class,'checkout'])->name('checkout');

Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

require __DIR__.'/auth.php';
