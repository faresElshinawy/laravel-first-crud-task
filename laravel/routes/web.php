<?php

use App\Http\Controllers\CategoryController;
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

// show all categories
Route::get("/categories",[CategoryController::class,'index']);
Route::get("/",[CategoryController::class,'index']);

// create new category
Route::get("/categories/create",[CategoryController::class,'create']);
// store product values
Route::post("/categories",[CategoryController::class,'store']);

// edit category form
Route::get('/categories/edit/{id}',[CategoryController::class,'edit']);
// submit updated data
Route::put('/categories/update/{id}',[CategoryController::class,'update']);

// delete category
Route::delete('/categories/{id}',[CategoryController::class,'destroy']);


// show all products
Route::get('/products',[ProductController::class,'index']);

// create new product
Route::get('/products/create',[ProductController::class,'create']);

// store product values
Route::post('/products',[ProductController::class,'store']);

// edit product
Route::get('products/edit/{id}',[ProductController::class,'edit']);

// submit product updated values
Route::put('products/update/{id}',[ProductController::class,'update']);

// delete product
Route::delete('products/{id}',[ProductController::class,'destroy']);
