<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;

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

Route::middleware('admin_auth')->group(function () {
//     Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');


});

Route::get('home', [UserController::class, 'userHome'])->name('user#home');
            Route::get('all', [UserController::class, 'all'])->name('user#all');
            Route::get('cartoon', [UserController::class, 'cartoon'])->name('user#cartoon');
            Route::get('movie', [UserController::class, 'movie'])->name('user#movie');
            Route::get('series', [UserController::class, 'series'])->name('user#series');
            Route::get('movie/details/{id}', [UserController::class, 'movieDetail'])->name('user#movieDetail');

Route::middleware(['auth'])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['admin_auth'])->group(function() {
        // admin dashboard
        Route::get('adminHome', [UserController::class, 'adminHome'])->name('admin#dashboard');

        // admin
        Route::prefix('admin')->group(function () {
            Route::get('profile/{id}', [AdminController::class, 'profile'])->name('admin#profile');
            Route::post('update', [AdminController::class, 'update'])->name('admin#update');
            Route::post('changePassword', [AdminController::class, 'changePassword'])->name('admin#changePassword');
            Route::get('delete/{id}', [AdminController::class, 'delete'])->name('admin#deleteUser');
        });

        // genre
        Route::prefix('genre')->group(function () {
            Route::get('list', [GenreController::class, 'list'])->name('genre#list');
            Route::post('create', [GenreController::class, 'create'])->name('genre#create');
            Route::get('delete/{id}', [GenreController::class, 'delete'])->name('genre#delete');
            Route::get('edit/{id}', [GenreController::class, 'edit'])->name('genre#edit');
            Route::post('update', [GenreController::class, 'update'])->name('genre#update');
        });

        // movie
        Route::prefix('movie')->group(function() {
            Route::get('list', [MovieController::class, 'list'])->name('movie#list');
            Route::get('create', [MovieController::class, 'createPage'])->name('movie#createPage');
            Route::post('create', [MovieController::class, 'create'])->name('movie#create');
            Route::get('detail/{id}', [MovieController::class, 'detail'])->name('movie#detail');
            Route::get('edit/{id}', [MovieController::class, 'edit'])->name('movie#edit');
            Route::post('update', [MovieController::class, 'update'])->name('movie#update');
            Route::get('delete/{id}', [MovieController::class, 'delete'])->name('movie#delete');
        });

        // user
        Route::prefix('user')->group(function() {
            Route::get('list', [UserController::class, 'list'])->name('user#list');
            Route::post('promote', [UserController::class, 'promote'])->name('user#promote');
            Route::post('demote', [UserController::class, 'demote'])->name('user#demote');
            Route::get('checkPayment/{id}', [UserController::class, 'checkPayment'])->name('user#checkPyament');
            Route::post('accept', [UserController::class, 'accept'])->name('user#accept');
            Route::post('reject', [UserController::class, 'reject'])->name('user#reject');
        });
    });

    Route::middleware(['user_auth'])->group(function(){
        // Route::get('userHome', [UserController::class, 'userHome'])->name('user#home');

        Route::prefix('user')->group(function() {

            Route::get('profile', [UserController::class, 'profile'])->name('user#profile');
            Route::get('payment', [UserController::class, 'paymentPage'])->name('user#paymentPage');
            Route::post('updateProfile', [UserController::class, 'updateProfile'])->name('user#updateProfile');
            Route::post('changePassword', [UserController::class, 'changePassword'])->name('user#changePassword');
            Route::post('payment', [UserController::class, 'payment'])->name('user#payment');
            Route::post('comment/post', [UserController::class, 'postComment'])->name('user#postComment');

            Route::post('/movies/{movie}/favorite', [MovieController::class, 'favorite'])->name('movies.favorite');
            Route::post('/movies/{movie}/unfavorite', [MovieController::class, 'unfavorite'])->name('movies.unfavorite');
            Route::get('/movies/favorites', [MovieController::class, 'favorites'])->name('movies.favorites');
            Route::post('/movies/unfavorite', [MovieController::class, 'deleteFavorite'])->name('movies.deleteFavorite');
            Route::post('/movies/favorite', [MovieController::class, 'addFavorite'])->name('movies.addFavorite');
        });
    });


});
