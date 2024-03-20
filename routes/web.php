<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('social.redirect'),
    ]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductsController::class, 'index']);

    Route::post('/cart/add/{productId}', [ProductsController::class, 'product'])->name('product.add');
});


require __DIR__.'/auth.php';
