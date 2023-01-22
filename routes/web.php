<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\SignInController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [SignInController::class, 'index']) -> name('register');
Route::post('/register', [SignInController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']) -> name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store']) -> name('logout');

Route::get('/edit', [ProfileController::class, 'index']) -> name('profile.index');
Route::post('/edit', [ProfileController::class, 'store']) -> name('profile.store');

Route::get('/{user:username}', [PostController::class, 'index']) -> name('posts.index');
Route::get('/posts/create', [PostController::class, 'create']) -> name('posts.create');
Route::post('/posts', [PostController::class, 'store']) -> name('posts.store');
Route::get('/{user:username}/post/{post}', [PostController::class, 'show']) -> name('posts.show');
Route::post('/{user:username}/post/{post}', [CommentController::class, 'store']) -> name('comments.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy']) -> name('posts.destroy');

Route::post('/images', [ImageController::class, 'store']) -> name('images.store');

Route::post('/{user:username}/follow', [FollowerController::class, 'store']) -> name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy']) -> name('users.unfollow');
