<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
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


  Route::get('/dashboard', function () {
      return view('dashboard');
  })->name('dashboard')->middleware('auth');

  Route::get('/public', function () {
    return view('public');
  })->name('public');

  Route::get('/create', function () {
    return view('create-blog');
  })->name('create')->middleware('auth');

  //Login & Register
  Route::get('/register', [AuthController::class, 'registration'])->name('register')->middleware('guest');
  Route::post('/post-register', [AuthController::class, 'getRegister'])->name('register.post');
  Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
  Route::post('/post-login', [AuthController::class, 'getLogin'])->name('login.post');
  Route::get('/logout', [AuthController::class, 'getLogOut'])->name('logout');

  //Blog
  Route::get('/blog', [PostController::class, 'getBlog'])->name('blog');
  Route::post('/createpost', [PostController::class, 'createNewPost'])->name('createpost')->middleware('auth');
  Route::post('/edit', [PostController::class, 'editPost'])->name('edit')->middleware('auth');
  Route::get('/post-delete/{post_id}', [PostController::class, 'getDeletePost'])->name('post.delete')->middleware('auth');
  Route::post('/like', [PostController::class, 'postLikePost'])->name('like');
  
  //Account
  Route::get('/account', [AccountController::class, 'getAccount'])->name('account')->middleware('auth');
  Route::post('/updateaccount', [AccountController::class, 'postSaveAccount'])->name('account.save')->middleware('auth');
  Route::get('/userimage/{filename}', [AccountController::class, 'getUserImage'])->name('account.image')->middleware('auth');
  
  //Route::get('/contact', [AuthController::class, 'getContact'])->name('contact');
