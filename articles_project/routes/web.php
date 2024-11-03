<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticlesController::class, 'create'])->middleware[('auth')];
Route::post('/articles', [ArticlesController::class, 'store'])->middleware[('auth')];
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit'])->middleware[('auth')];
Route::get('/articles/{article}', [ArticlesController::class, 'show']);
Route::put('/articles/{article}', [ArticlesController::class, 'update'])->middleware[('auth')];
Route::delete('/articles/{article}', [ArticlesController::class, 'destroy'])->middleware[('auth')];