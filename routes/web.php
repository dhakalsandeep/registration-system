<?php

use App\Http\Controllers\PatientTypeController;
use App\Models\PatientType;
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
    return redirect()->route('patient_type.index');
});

Route::get('/patient-types', [PatientTypeController::class, 'index'])->name('patient_type.index');
Route::get('/patient-types/create', [PatientTypeController::class, 'create'])->name('patient_type.create');
