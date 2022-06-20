<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// for basic CRUD api
// public routes, without authentication
Route::resource('products', ProductController::class);

// we need to implement this for authentication
//Route::get('/products', [ProductController::class, 'index']);
//Route::post('/products', [ProductController::class, 'store']);
//Route::get('/products/{product}', [ProductController::class, 'show']);
//Route::put('/products/{product}', [ProductController::class, 'update']);
//Route::delete('/products/{product}', [ProductController::class, 'destroy']);

// protected route
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/products/search/{name}', [ProductController::class, 'search']);
});
// public route
//Route::get('/products/search/{name}', [ProductController::class, 'search']);


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
