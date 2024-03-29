<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",[ProductController::class,"index"])->name("product.index");
Route::get("/create",[ProductController::class,"create"])->name("product.create");
Route::post("/create",[ProductController::class,"store"])->name("product.store");
Route::get("/{product}",[ProductController::class,"show"])->name("product.show");
Route::get("/{product}/edit",[ProductController::class,"edit"])->name("product.edit");
Route::put("/{product}",[ProductController::class,"update"])->name("product.update");
Route::delete("/{product}",[ProductController::class,"destroy"])->name("product.destroy");




