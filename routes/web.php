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

    //Doctor
    Route::get("/index_doctor",[\App\Http\Controllers\PetController::class, 'petListOfDoctor'])->name('petList02');
    Route::get("/petInfo_doctor/{id}", [\App\Http\Controllers\PetController::class,'petInfo_doctor'])->name('doctor.petInfo');
    Route::get("/patient_update/{patient_id}", [App\Http\Controllers\PetController::class, 'formpatient']);
    Route::post('/patient_store/{patient_id}', [App\Http\Controllers\PetController::class, 'patient_update'])->name('patient_store');
//    Route::delete('/patient_delete/{id}', [App\Http\Controllers\PetController::class, 'destroy'])->name('patient.destroy');
    Route::get("/patient_form", [App\Http\Controllers\PetController::class, 'addform'])->name('patient_form');
    Route::get('/patients_add', [App\Http\Controllers\PetController::class, 'store'])->name('patient_add');

});
