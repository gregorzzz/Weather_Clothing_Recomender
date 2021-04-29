<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\wardrobeController;

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
    return view('pages.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/wardrobe', [wardrobeController::class,'index'])->name('wardrobe-index');

Route::get('/wardrobe/create', [wardrobeController::class,'create'])->name('pages.create');
Route::post('/wardrobe/create', [wardrobeController::class,'create'])->name('pages.create');
Route::post('/wardrobe',[wardrobeController::class,'store']);
Route::post('/product/{id}',[wardrobeController::class,'show'])->name('product-show');
Route::get('/product/{id}',[wardrobeController::class,'show'])->name('product-show');

