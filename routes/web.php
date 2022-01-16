<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, "viewAll"]);
Route::get('/detail/{id}', [ProductController::class, "detail"]);

Route::get('/product/create', [ProductController::class,"createForm"]);
Route::post('/product/create', [ProductController::class, "postForm"]);


Route::get('/add-to-cart/{id}', [ProductController::class, "addToCart"]);
Route::get('/cart',[ProductController::class, "viewCart"]);
