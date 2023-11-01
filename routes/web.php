<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


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

Route::get('/', function () {
    return view('welcome');
});



/* MIDDLEWARE LOGIN DAN REGISTER ( TIDAK BISA AKSES ROUTE JIKA USER SUDAH LOGIN) */
Route::middleware(['guest'])->group(function(){
    Route::get('login',[SesiController::class,'index'])->name('login');
    Route::post('login',[SesiController::class,'login'])->name('login');
    Route::get('register',[SesiController::class ,'showRegister'])->name('register');
    Route::post('register',[SesiController::class ,'register'])->name('register');
});


/* USER BELUM LOGIN (TAMU) TIDAK BISA AKSES ROUTE DIBAWAH INI */
Route::middleware(['auth'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('/logout',[SesiController::class ,'logout'])->name('logout');

});


// TESTING MODEL

// Route::get('/cekdata', function(){
//     foreach (User::all() as $pengguna){
//         echo $pengguna->password;
//     }
// });
