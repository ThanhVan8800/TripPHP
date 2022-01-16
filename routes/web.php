<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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
Route::get('login',[LoginController::class,'show'])->name('login');
Route::post('login',[LoginController::class,'loginAuth'])->name('login');
Route::post('logout',[LoginController::class,'logout'])->name('logout');
Route::get('register',[RegisterController::class,'show'])->name('register');
Route::post('register',[RegisterController::class,'create'])->name('register');
// Route::post('register',[RegisterController::class,'create'])->name('register');

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('main', [MainController::class, 'index']);

        Route::prefix('user')->group(function(){
            // Route::get('index',[UserController::class,'index']);
            // Route::get('add',[UserController::class,'create']);
            // Route::post('add',[UserController::class,'store']);// menu validate form xác thực 
            // Route::get('edit',[UserController::class,'edit']);
            Route::resource('taikhoan',UserController::class);
            
        });
        
    });
    
});