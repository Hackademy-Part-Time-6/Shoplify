<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\FavoriteController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/ads/create', [AdController::class,'create'])->name('ads.create');

Route::delete('/ads/{ad}', [AdController::class, 'destroy'])->middleware('auth')->name('ads.destroy');

Route::get('/my-ads', [AdController::class, 'myAds'])->middleware('auth')->name('my-ads');

Route::get('/', [PublicController::class,'index'])->name('home');

Route::get('/category/{category:name}/ads',[PublicController::class, 'adsByCategory'])->name('category.ads');

Route::get('/ads/{ad}', [AdController::class,'show'])->name("ads.show");

Route::middleware(['isRevisor'])->group(function () {

    Route::get('/revisor',[RevisorController::class,'index'] )->name('revisor.home');

    Route::patch('/revisor/ad/{ad}/accept',[RevisorController::class,'acceptAd'])->name('revisor.ad.accept');

    Route::patch('/revisor/ad/{ad}/reject',[RevisorController::class,'rejectAd'])->name('revisor.ad.reject');
});

Route::get('revisor/become',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('revisor.become');

Route::get('revisor/{user}/make',[RevisorController::class,'makeRevisor'])->middleware('auth')->name('revisor.make');

Route::post('/locale/{locale}', [PublicController::class,'setLocale'])->name('locale.set');

Route::get("/search", [PublicController::class, 'search'])->name('search');

Route::get('/favorites', [FavoriteController::class, 'index'])->middleware('auth')->name('favorites.index');

Route::post('/favorites/{ad}', [FavoriteController::class, 'add'])->middleware('auth')->name('favorites.add');

Route::delete('/favorites/{ad}', [FavoriteController::class, 'remove'])->middleware('auth')->name('favorites.remove');

Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->middleware('auth')->name('ads.edit');

Route::put('/ads/{ad}', [AdController::class, 'update'])->middleware('auth')->name('ads.update');



