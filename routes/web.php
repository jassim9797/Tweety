<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\TweetController;
use  App\Http\Controllers\ProfileController;
use  App\Http\Controllers\FollowController;
use  App\Http\Controllers\ExploreController;
use  App\Http\Controllers\LogoutController;
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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout'); 
Route::post('/tweets', [TweetController::class, 'store'])->name('tweet');
Route::post('/profiles/{user:username}/follow', [FollowController::class, 'store'])->name('follow');
Route::get('/tweets', [TweetController::class, 'index'])->name('tweets');
Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profile'); 
Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('editProfile'); 
Route::patch('/profiles/{user:username}', [ProfileController::class, 'update'])->name('updateProfile'); 
Route::get('/explore', [ExploreController::class, 'index'])->name('explore'); 
Route::post('/tweets/{tweet}/like', [TweetController::class, 'like'])->name('like');
Route::post('/tweets/{tweet}/dislike', [TweetController::class, 'dislike'])->name('dislike');
Route::delete('/tweets/{tweet}/unlike', [TweetController::class, 'unlike'])->name('like');
Route::delete('/tweets/{tweet}/undislike', [TweetController::class, 'undislike'])->name('like');
});


