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
  
  Route::get('/register', [AuthController::class, 'registration'])->name('register');
  Route::post('/post-register', [AuthController::class, 'getRegister'])->name('register.post');
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::post('/post-login', [AuthController::class, 'getLogin'])->name('login.post');
  Route::get('/blog', [PostController::class, 'getBlog'])->name('blog')->middleware('auth');
  Route::post('/createpost', [PostController::class, 'createNewPost'])->name('createpost')->middleware('auth');
  Route::get('/post-delete/{post_id}', [PostController::class, 'getDeletePost'])->name('post.delete')->middleware('auth');
  Route::get('/account', [UserController::class, 'getAccount'])->name('account');
  Route::post('/updateaccount', [UserController::class, 'postSaveAccount'])->name('account.save');
  Route::get('/userimage/{filename}', [UserController::class, 'getUserImage'])->name('account.image');

  Route::get('/logout', [AuthController::class, 'getLogOut'])->name('logout');
  Route::post('/edit', [PostController::class, 'editPost'])->name('edit');
  Route::post('/like', [PostController::class, 'postLikePost'])->name('like');
});
