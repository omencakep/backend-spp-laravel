<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\siswa2Controller;
use App\Http\Controllers\sppController;
use App\Http\Controllers\pembayaranController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/',[LoginController::class,'halamanLogin'])->name('loginview');
Route::post('/postlogin',[LoginController::class,'postLogin'])->name('postlogin');


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class,'login']);
// Route::get('loginData', [LoginController::class,'loginData']);
// Route::get('loginUser', [LoginController::class, 'loginAuth'])->middleware('jwt.verify');
// Route::get('user', [UserController::class, 'getAuthenticatedUser'])->middleware('jwt.verify');

Route::post('register_siswa', [siswaController::class,'register']);
Route::post('login_siswa', [siswaController::class,'login']);
Route::get('/home_siswa', function(){
    return 'selamat datang di halaman siswa';
});


Route::group(['middleware'=>['jwt.verify:petugas']], function(){
    Route::get('/home', function(){
        return 'selamat datang di halaman petugas';
    });
});

Route::group(['middleware'=>['jwt.verify:admin']], function(){
    

    Route::get('/datakelas',[kelasController::class,'show']);
    Route::post('/insertkelas',[kelasController::class,'store']);
	Route::put('/updatekelas/{id}',[kelasController::class,'update']);
	Route::delete('/deletekelas/{id}',[kelasController::class,'delete']);

    Route::put('/updatesiswa/{id}',[siswa2Controller::class,'update']);
	Route::delete('/deletesiswa/{id}',[siswa2Controller::class,'delete']);

    Route::post('/insertspp',[sppController::class,'store']);
	Route::put('/updatespp/{id}',[sppController::class,'update']);
	Route::delete('/deletespp/{id}',[sppController::class,'delete']);

    Route::post('/insertpembayaran',[pembayaranController::class,'store']);
	Route::put('/updatepembayaran/{id}',[pembayaranController::class,'update']);
	Route::delete('/deletepembayaran/{id}',[pembayaranController::class,'delete']);
    // Route::get('loginUser', [LoginController::class, 'loginAuth']);
});

// Route::group(['middleware'=>['jwt.verify:siswa']], function(){
//     Route::get('/home_siswa', function(){
//         return 'selamat datang di halaman siswa';
//     });
// });