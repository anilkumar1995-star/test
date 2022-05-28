<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;

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
Route::group(['middleware' => ['IsAdmin']], function(){
    Route::get('/dummy-users', function () {
        Artisan::call("db:seed");
        return Redirect::back()->with('flash_message', 'User added successfully.');
    });
      
    Route::get('/users', [HomeController::class, 'index'])->name('users');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/partners', [HomeController::class, 'partner'])->name('partners');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
