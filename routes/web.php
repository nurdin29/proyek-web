<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtikelController;


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

/*Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/manage/artikel', [ArtikelController::class, 'index'])->name('manage.artikel');
Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::post('/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::get('/artikel/delete/{id}', [ArtikelController::class, 'destroy'])->name('artikel.delete');
Route::get('/artikel/detail/{id}', [ArtikelController::class, 'show'])->name('artikel.detail');


