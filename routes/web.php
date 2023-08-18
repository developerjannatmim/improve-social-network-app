<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Psr7\Message;
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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signup', [UserController::class, 'getSignUp'])->name('signup');
    Route::post('/signin', [UserController::class, 'getSignIn'])->name('signin');
    Route::get('/dashboard', [PostController::class, 'getDashboard'])->name('dashboard')->middleware('auth');
    Route::post('/createpost', [PostController::class, 'createNewPost'])->name('createpost')->middleware('auth');
    Route::get('/post-delete/{post_id}', [PostController::class, 'getDeletePost'])->name('post.delete')->middleware('auth');
    Route::get('/account', [UserController::class, 'getAccount'])->name('account');
    Route::post('/updateaccount', [UserController::class, 'postSaveAccount'])->name('account.save');
    Route::get('/userimage/{filename}', [UserController::class, 'getUserImage'])->name('account.image');

    Route::get('/logout', [UserController::class, 'getLogOut'])->name('logout');
    Route::post('/edit', [PostController::class, 'editPost'])->name('edit');
    Route::post('/like', [PostController::class, 'postLikePost'])->name('like');
});
