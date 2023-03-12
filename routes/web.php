<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [ThreadController::class, 'showwelcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/allthread', [ThreadController::class, 'showallthread'])->name('allthread');
Route::get('/thread/{id}', [ThreadController::class, 'showthread'])->name('threadcontent');
Route::get('/newpost/{id}', [ThreadController::class, 'shownewpost'])->name('newpost');
Route::get('/newthread', [ThreadController::class, 'shownewthread'])->name('newthread');
Route::post('/newpostcheck', [PostsController::class, 'newpost']);
Route::post('/newthreadcheck', [ThreadController::class, 'newthreadpost']);
require __DIR__.'/auth.php';
