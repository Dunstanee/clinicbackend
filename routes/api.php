<?php

use App\Http\Controllers\Authentication\RegistrationController;
use App\Http\Controllers\Patients\PatientController;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\Services\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('roles',[RoleController::class,'index'])->name('role.list');
Route::get('services',[ServiceController::class,'index'])->name('service.list');
Route::get('gender',[RegistrationController::class,'index'])->name('gender.list');
Route::post('patient/register',[RegistrationController::class,'register_patient'])->name('patient.register');
Route::post('staff/register',[RegistrationController::class,'register_staff'])->name('staff.register');




Route::get('patients',[PatientController::class,'index'])->name('patient.list');
Route::get('patient/{id}',[PatientController::class,'show'])->name('patient.list');


