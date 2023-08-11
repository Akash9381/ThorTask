<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home');
// Route::get('/',[RegistrationController::class,'Form']);
Route::get('/lang/{lg}',[RegistrationController::class,'ChangeLanguage']);

// Route::view('/home', 'home')->name('home');
Route::post('registration', [RegistrationController::class, 'Registration'])->name('registration')->middleware('guest');
Route::view('login', 'admin.sign-in')->name('login')->middleware('guest');
Route::post('authenticate', [AuthController::class, 'Authenticate']);

Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'AllUsers']);
        Route::get('/edit-user/{id}', [AdminController::class, 'EditUser']);
        Route::get('/user-delete/{id}', [AdminController::class, 'DeleteUser']);
        Route::post('/update-user/{id}', [AdminController::class, 'UpdateUser']);
        Route::view('/add-user', 'admin.customer.add-customer');
        Route::post('/registration', [RegistrationController::class, 'AdminRegistration']);

        // *********************** Company Routes ****************************
        Route::view('/add-company','admin.company.add-company');
        Route::post('/create-company',[CompanyController::class,'Store']);
        Route::get('/companies',[CompanyController::class,'Companies']);
        Route::get('/edit-company/{id}',[CompanyController::class,'EditCompany']);
        Route::post('/update-company/{id}',[CompanyController::class,'UpdateCompany']);
        Route::get('/company-delete/{id}',[CompanyController::class,'DeleteCompany']);

        // ******************************* Employee Routes ***************************
        Route::get('/employees',[EmployeeController::class , 'Employees']);
        Route::get('/add-employee',[EmployeeController::class , 'EmployeeForm']);
        Route::get('/edit-employee/{id}',[EmployeeController::class , 'EditEmployee']);
        Route::post('/create-employee',[EmployeeController::class , 'CreateEmployee']);
        Route::post('/update-employee/{id}',[EmployeeController::class , 'UpdateEmployee']);
        Route::get('/employee-delete/{id}',[EmployeeController::class , 'DeleteEmployee']);
    });
});
Route::group(['middleware' => ['role:user', 'auth']], function () {
    Route::prefix('user')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
    });
});

Route::get('logout',[AuthController::class,'Logout']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
