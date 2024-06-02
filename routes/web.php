<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
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




Auth::routes();
//Route::get("/index",[\App\Http\Controllers\Admin\UserController::class,'index']);
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/edit/{id}', [\App\Http\Controllers\HomeController::class, 'profileForm'])->name('user.profile.edit'); // Trả về form edit category
    Route::post('/edit/{id}', [\App\Http\Controllers\HomeController::class, 'updateProfile'])->name('user.profile.update'); // Update category

    Route::get("/customer/index", [\App\Http\Controllers\PetController::class, 'petListOfUser'])->name('user.listPet');
    Route::get("/customer/show", [\App\Http\Controllers\HomeController::class, "show"])->name('user.show');
    Route::get("/petInfo/{id}", [\App\Http\Controllers\PetController::class, 'petInfo'])->name('user.petInfo');
    Route::get("/pet_update", function () {
        return view('content.user.updatePetInformation.pet_update');
    });
    Route::get("/pet_update/{id}", [App\Http\Controllers\PetController::class, 'formpet']);
    Route::post('/pet_store/{id}',[App\Http\Controllers\PetController::class,'pet_update'])->name('pet_store');
    Route::get("/index",[\App\Http\Controllers\PetController::class, 'petListOfUser'])->name('petList');
    Route::group(['prefix' => '/customer/register'], function () {
        //Route::get('/home', [\App\Http\Controllers\User\UserController::class, 'index'])->name('user.home');
        Route::get('/room', [\App\Http\Controllers\User\CreateServiceController::class, 'showRegisterRoom'])->name('user.room.appoint');
        Route::post('/room', [\App\Http\Controllers\User\CreateServiceController::class, 'registerRoom'])->name('user.room.add');
        Route::get('/appointment', [\App\Http\Controllers\User\CreateServiceController::class, 'showRegisterAppoint'])->name('user.register.appoint');
        Route::post('/appointment', [\App\Http\Controllers\User\CreateServiceController::class, 'registerAppoint'])->name('user.register.appoint.add');
        Route::get('/service', [\App\Http\Controllers\User\CreateServiceController::class, 'showService'])->name('user.register.service');
        Route::post('/service', [\App\Http\Controllers\User\CreateServiceController::class, 'addService'])->name('user.register.service.add');
        Route::get('/service/history', [\App\Http\Controllers\User\CreateServiceController::class, 'historyService'])->name('user.service.history');
        Route::get('/room/history', [\App\Http\Controllers\User\CreateServiceController::class, 'historyRoom'])->name('user.room.history');
        Route::get('/appointment/history', [\App\Http\Controllers\User\CreateServiceController::class, 'historyAppointment'])->name('user.appointment.history');


        //Route::get('/service/history', [\App\Http\Controllers\User\CreateServiceController::class, ''])->name('user.service.history');
        //Route::get('/success', [\App\Http\Controllers\User\CreateServiceController::class, 'index'])->name('appointments.index');
        Route::get('/pet', [\App\Http\Controllers\User\CreateServiceController::class, 'showRegisterPet'])->name('user.register.add');
        Route::post('/pet/store', [\App\Http\Controllers\User\CreateServiceController::class, 'registerPet'])->name('user.register.pet.store');
    });
});
Route::resource('appointments', AppointmentController::class);

Route::group(['prefix' => 'doctor', 'middleware' => ['doctor']], function () {
    // Định nghĩa các routes dành riêng cho bác sĩ
    Route::get('/search_pet', [App\Http\Controllers\Admin\DoctorController::class, 'search'])->name('search_pet');
    Route::get('/calendar', [App\Http\Controllers\Admin\DoctorController::class, 'calendar'])->name('doctor.calendar');
    Route::get('/calendar_today', [App\Http\Controllers\Admin\DoctorController::class, 'todayAppointments'])->name('doctor.calendar_today');
    Route::get("/patient_update/{patient_id}", [App\Http\Controllers\PetController::class, 'formpatient'])->name('formpatient');
    Route::post('/patient_store/{patient_id}', [App\Http\Controllers\PetController::class, 'patient_update'])->name('patient_store');
    Route::get("/patient_form/{pet_id}", [App\Http\Controllers\PetController::class, 'addform'])->name('patient_form');
    Route::post('/patients_add/{pet_id}', [App\Http\Controllers\PetController::class, 'store'])->name('patient_add');

});

Route::group(['middleware' => ['manager']], function () {
    // Định nghĩa các routes dành riêng cho quản lý
    return view("profile");
});

Route::middleware(["auth:web"])->group(function () {
    Route::get("/index_doctor", [\App\Http\Controllers\PetController::class, 'petListOfDoctor'])->name('petList02');
    Route::get("/petInfo_doctor/{id}", [\App\Http\Controllers\PetController::class, 'petInfo_doctor'])->name('doctor.petInfo');
});
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {

    Route::group(['prefix' => 'doctor'], function () {
        Route::get('/', [DoctorController::class, 'index'])->name("admin.doctor.index"); // danh sách danh mục
        Route::get('/add', [DoctorController::class, 'add'])->name('admin.doctor.add'); // Trả về form thêm mới
        Route::post('/add', [DoctorController::class, 'store'])->name('admin.doctor.store'); // tạo mới category
        Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('admin.doctor.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [DoctorController::class, 'update'])->name('admin.doctor.update'); // Update category
        Route::get('/delete/{id}', [DoctorController::class, 'destroy'])->name('admin.doctor.destroy'); // delete category
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name("admin.user.index"); // danh sách danh mục
        Route::get('/add', [UserController::class, 'add'])->name('admin.user.add'); // Trả về form thêm mới
        Route::post('/add', [UserController::class, 'store'])->name('admin.user.store'); // tạo mới category
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('admin.user.update'); // Update category
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy'); // delete category
    });
    Route::group(['prefix' => 'type-of-service'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name("admin.typeOfService.index"); // danh sách danh mục
        Route::get('/add', [ServiceController::class, 'add'])->name('admin.typeOfService.add'); // Trả về form thêm mới
        Route::post('/add', [ServiceController::class, 'store'])->name('admin.typeOfService.store'); // tạo mới category
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('admin.typeOfService.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [ServiceController::class, 'update'])->name('admin.typeOfService.update'); // Update category
        Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->name('admin.typeOfService.destroy'); // delete category
    });
    Route::group(['prefix' => 'room'], function () {
        Route::get('/', [RoomController::class, 'index'])->name("admin.room.index"); // danh sách danh mục
        Route::get('/add', [RoomController::class, 'add'])->name('admin.room.add'); // Trả về form thêm mới
        Route::post('/add', [RoomController::class, 'store'])->name('admin.room.store'); // tạo mới category
        Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('admin.room.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [RoomController::class, 'update'])->name('admin.room.update'); // Update category
        Route::get('/delete/{id}', [RoomController::class, 'destroy'])->name('admin.room.destroy'); // delete category
    });
    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/', [AppointmentController::class, 'index'])->name("appointment.index");
        Route::get('/', [AppointmentController::class, 'index'])->name("admin.appointment.index"); // danh sách danh mục
        Route::get('/add', [AppointmentController::class, 'add'])->name('admin.appointment.add'); // Trả về form thêm mới
        Route::post('/add', [AppointmentController::class, 'store'])->name('admin.appointment.store'); // tạo mới category
        Route::get('/edit/{id}', [AppointmentController::class, 'edit'])->name('admin.appointment.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [AppointmentController::class, 'update'])->name('admin.appointment.update'); // Update category
        Route::get('/delete/{id}', [AppointmentController::class, 'destroy'])->name('admin.appointment.destroy'); // delete category
    });
});

