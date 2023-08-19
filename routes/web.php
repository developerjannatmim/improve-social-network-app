<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
  Route::get('/dashboard', function () {
      return view('dashboard');
  })->name('dashboard')->middleware('auth');

  Route::get('/', function () {
    return view('public');
  })->name('public');

  //Login & Register
  Route::get('/register', [AuthController::class, 'registration'])->name('register');
  Route::post('/post-register', [AuthController::class, 'getRegister'])->name('register.post');
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::post('/post-login', [AuthController::class, 'getLogin'])->name('login.post');
  Route::get('/logout', [AuthController::class, 'getLogOut'])->name('logout');

  //Blog
  Route::get('/blog', [PostController::class, 'getBlog'])->name('blog');
  Route::post('/createpost', [PostController::class, 'createNewPost'])->name('createpost')->middleware('auth');
  Route::post('/edit', [PostController::class, 'editPost'])->name('edit')->middleware('auth');
  Route::post('/like', [PostController::class, 'postLikePost'])->name('like');
  
  //Account
  Route::get('/post-delete/{post_id}', [PostController::class, 'getDeletePost'])->name('post.delete')->middleware('auth');
  Route::get('/account', [UserController::class, 'getAccount'])->name('account')->middleware('auth');
  Route::post('/updateaccount', [UserController::class, 'postSaveAccount'])->name('account.save')->middleware('auth');
  Route::get('/userimage/{filename}', [UserController::class, 'getUserImage'])->name('account.image')->middleware('auth');
  
  //Route::get('/contact', [AuthController::class, 'getContact'])->name('contact');
});
