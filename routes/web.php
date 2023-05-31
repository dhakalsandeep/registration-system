<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientTypeController;
use App\Models\PatientType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return redirect()->route('patient_type.index');
});

Route::get('/patient-types', [PatientTypeController::class, 'index'])->name('patient_type.index');
Route::get('/patient-types/create', [PatientTypeController::class, 'create'])->name('patient_type.create');
Route::post('/patient-types', [PatientTypeController::class, 'store'])->name('patient_type.store');
Route::get('/patient-types/{patienttypeid}', [PatientTypeController::class, 'show'])->name('patient_type.show');
Route::get('/patient-types/{patienttypeid}/edit', [PatientTypeController::class, 'edit'])->name('patient_type.edit');
Route::put('/patient-types/{patienttypeid}', [PatientTypeController::class, 'update'])->name('patient_type.update');
Route::delete('/patient-types/{patienttypeid}', [PatientTypeController::class, 'destroy'])->name('patient_type.destroy');

Route::resource('departments', DepartmentController::class);

Route::resource('patients', PatientController::class);
Route::get('/patients/get_department_wise_charge', [PatientController::class, 'getDepartmentWiseCharge'])->name('patients.get_department_wise_charge');
Route::get('/patients/visit', [PatientController::class, 'createVisit'])->name('patients.create_visit');
Route::post('/patients/visit', [PatientController::class, 'storeVisit'])->name('patients.store_visit');
