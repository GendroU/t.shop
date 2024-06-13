<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StripeController;

Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/checkout/session', [StripeController::class, 'createCheckoutSession'])->name('checkout.session');
Route::get('/checkout/success', [StripeController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [StripeController::class, 'cancel'])->name('checkout.cancel');
 
//Route::get('/', function () {
//    return view('welcome');
//});
 
Route::get('/', [ProductsController::class, 'index']);
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');