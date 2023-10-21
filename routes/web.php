<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\QuestionaireController;
use App\Http\Controllers\ParentalQuestionaireController;
use App\Http\Controllers\TipeAbsensiController;
use App\Http\Controllers\JadwalRollingController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UangMakanController;
use App\Http\Controllers\DashboardController;

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
Route::get('/404',function(){
    return view('errors.404');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function(){
        return UserController::home();
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard',function(){
            return DashboardController::view();
        });
        // BIODATA
        Route::get('/biodata_insert',function(){
            return view('biodatainsert');
        });
        Route::post('/biodata_insert',function(Request $request){
            return BiodataController::insert($request);
        });
        Route::get('/biodata_edit/{IdAnak}',function($IdAnak){
            return BiodataController::update_view($IdAnak);
        });
        Route::post('/biodata_edit',function(Request $request){
            return BiodataController::update($request);
        });
        Route::post('/biodata_delete/{IdAnak}',function($IdAnak){
            return BiodataController::delete($IdAnak);
        });
        // Buat Questionnaire
        Route::get('/questionnaire_insert',function(){
            return QuestionaireController::view();
        });
        Route::post('/questionnaire_insert',function(Request $request){
            return QuestionaireController::insert($request);
        });
        Route::post('/questionnaire_delete/{IdQuestionaire}',function($IdQuestionaire){
            return QuestionaireController::delete($IdQuestionaire);
        });
        // Tipe Absensi
        Route::get('/tipe_absensi_insert',function(){
            return TipeAbsensiController::view();
        });
        Route::post('/tipe_absensi_insert',function(Request $request){
            return TipeAbsensiController::insert($request);
        });
        Route::post('/tipe_absensi_delete/{IdTipe}',function($IdTipe){
            return TipeAbsensiController::delete($IdTipe);
        });
        // Schedulling
        Route::get('/jadwal_rolling',function(){
            return JadwalRollingController::crud_view();
        });
        Route::post('/jadwal_rolling',function(Request $request){
            return JadwalRollingController::insert($request);
        });
        Route::get('/jadwal_rolling_edit/{IdJadwal}',function($IdJadwal){
            return JadwalRollingController::edit_view($IdJadwal);
        });
        Route::post('/jadwal_rolling_edit',function(Request $request){
            return JadwalRollingController::edit($request);
        });
        Route::post('/jadwal_rolling_delete/{IdJadwal}',function($IdJadwal){
            return JadwalRollingController::delete($IdJadwal);
        });
        // Invoice
        Route::get('/input_invoice',function(Request $request){
            return InvoiceController::input_view($request);
        });
        Route::get('/input_invoice_form',function(Request $request){
            return InvoiceController::input_view_selected($request);
        });
        Route::get('/input_invoice/{IdAnak}',function($IdAnak){
            return InvoiceController::input_view_form($IdAnak);
        });
        Route::post('/input_invoice',function(Request $request){
            return InvoiceController::insert($request);
        });
        Route::get('/invoice_archive',function(){
            return InvoiceController::view();
        });
        Route::get('/invoice_detail/{NoInvoice}',function($NoInvoice){
            return InvoiceController::view_detail($NoInvoice);
        });
        Route::post('/invoice_detail/{NoInvoice}',function($NoInvoice){
            return InvoiceController::update_lunas($NoInvoice);
        });
        // Uang Makan
        Route::get('/uang_makan',function(){
            return UangMakanController::view();
        });
        // Daftar Absensi
        Route::get('/daftar_absensi',function(Request $request){
            return AbsensiController::view($request);
        });
        
    });
    Route::middleware(['role:owner'])->group(function () {
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
    });
    Route::middleware(['role:terapis,admin'])->group(function () {
        Route::get('/biodata_view',function(){
            return BiodataController::view();
        });
        // Questionnaire
        Route::get('/parental_questionnaire',function(){
            return ParentalQuestionaireController::view();
        });
        Route::post('/parental_questionnaire',function(Request $request){
            return ParentalQuestionaireController::insert($request);
        });
        Route::post('/parental_questionnaire_delete/{IdAnak}',function($IdAnak){
            return ParentalQuestionaireController::delete($IdAnak);
        });
        Route::get('/parental_questionnaire_view',function(){
            return view('parental_questionnaire_view');
        });
        Route::get('/parental_questionnaire_view/{IdAnak}',function($IdAnak){
            return ParentalQuestionaireController::view_detail($IdAnak);
        });
        // Daftar absensi terapis
        Route::get('/daftar_absensi_terapis',function(){
            return AbsensiController::view_terapis();
        });
        Route::post('/daftar_absensi',function(Request $request){
            return AbsensiController::update($request);
        });
        // Kehadiran
        Route::get('/kehadiran',function(){
            return AbsensiController::view_kehadiran();
        });
        Route::get('/search', function (Request $request) {
            return BiodataController::search($request);
        });
    });
    Route::middleware(['role:staff,terapis,admin'])->group(function () {
        Route::get('/jadwal_rolling_view', function () {
            return JadwalRollingController::view();
        });
    });
});
