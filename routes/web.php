<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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


Auth::routes();

Route::get(
    'registerPet',
    [
        RegisterController::class,
        'index'
    ]
);
Route::post('registerPet', [
    RegisterController::class,
    'addPet'
]);

Route::get('registerPetRoom', [
    RegisterController::class,
    'registerRoom'
]);
Route::post('registerPetRoom', [
    RegisterController::class,
    'addPetRoom'
]);

Route::get('registerApoi', [
    RegisterController::class,
    'registerApoi'
]);

Route::post('registerApoi', [
    RegisterController::class,
    'addApoi'
]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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


