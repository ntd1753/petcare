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

Route::get("/pet_update/{id}", [App\Http\Controllers\PetController::class, 'formpet']);
Route::post('/pet_store/{id}',[App\Http\Controllers\PetController::class,'pet_update'])->name('pet_store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth:web']], function () {
    Route::get("/index",[\App\Http\Controllers\PetController::class, 'petListOfUser'])->name('petList');
    Route::get("/petInfo/{id}", [\App\Http\Controllers\PetController::class,'petInfo'])->name('user.petInfo');
});
