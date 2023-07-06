<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ProdukController::class, 'index']);
Route::get('cart', [produkController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [produkController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [produkController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [produkController::class, 'remove'])->name('remove_from_cart');
Route::get('/', [UserController::class, 'index']);
Route::get('/produk', [UserController::class, 'produk']) ->name('user.produk');
Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::resources([
        'Produk' => ProdukController::class,
        'kategori' => KategoriController::class,
    ]);
     Route::get('/Produk', [ProdukController::class, 'index']) ->name('produk.Produk');
    // Route::get('/Kategori2', [ProdukController::class, 'kategori2']) ->name('user.Kategori2');
    // Route::get('/Kategori3', [ProdukController::class, 'kategori3']) ->name('user.Kategori3');
});