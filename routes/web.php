<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/pet_update", function (){
    return view('content.user.updatePetInformation.pet_update');
});

Auth::routes();
//Route::get("/index",[\App\Http\Controllers\Admin\UserController::class,'index']);
Route::get("/index",[\App\Http\Controllers\Admin\DoctorController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['customer']], function () {
    Route::get("/index",[\App\Http\Controllers\PetController::class, 'petListOfUser']);
    Route::get("/petInfo/{id}", [\App\Http\Controllers\PetController::class,'petInfo'])->name('user.petInfo');
});

Route::group(['middleware' => ['doctor']], function () {
    // Định nghĩa các routes dành riêng cho bác sĩ
    return view("home");
});

Route::group(['middleware' => ['manager']], function () {
    // Định nghĩa các routes dành riêng cho quản lý
    return view("profile");
});

Route::group(['middleware' => ['admin']], function () {
    return view("test1");
});
