<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
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
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
})->name('login');
Route::post('/login', function (Request $request) {
    return AuthController::login($request);
});
Route::get('/logout', function () {
    return AuthController::logout();
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',function(){
        return view('dashboard');
    });
    Route::get('/user_view',function(){
        return UserController::view();
    });
    Route::get('/user_form',function(){
        return view('userform');
    });
    Route::post('/user_form',function(Request $request){
        return UserController::insert($request);
    });
    Route::get('/user_toggle_status/{NoIdentitas}',function($NoIdentitas){
        return UserController::update_status($NoIdentitas);
    });    
    Route::get('/user_edit/{NoIdentitas}',function($NoIdentitas){
        return UserController::update_view($NoIdentitas);
    });
    Route::post('/user_edit',function(Request $request){
        return UserController::update($request);
    });
    Route::post('/user_delete/{NoIdentitas}',function($NoIdentitas){
        return UserController::delete($NoIdentitas);
    });
    Route::get('/biodata_insert',function(){
        return view('biodatainsert');
    });
    Route::get('/biodata_view',function(){
        return view('biodataview');
    });
});
