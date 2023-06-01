<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Patient\PatientController;
use App\Http\Controllers\API\Patient\Dashboard\DashboardController;

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

Route::prefix('v1')->group(function(){

    Route::prefix('auth')->controller(PatientController::class)->group(function(){
        Route::post('/masuk', 'login'); // v1/auth/masuk
        Route::prefix('forgot-password')->group(function(){
            Route::post('/send-otp', 'sendOTP'); // v1/auth/forgot-password/send-otp
            Route::post('/validate-otp', 'validateOTP'); // v1/auth/forgot-password/validate-otp
            Route::post('/reset-password', 'resetPassword'); // v1/auth/forgot-password/reset-password
        });
    });

    Route::prefix('dashboard')->controller(DashboardController::class)->group(function(){
        Route::get('/jadwal-obat/{id_pasien}', 'jadwalObat'); // v1/dashboard/jadwal-obat/{id_pasien}
    });

    Route::middleware(['auth:sanctum', 'pasien'])->group(function(){
        Route::prefix('auth')->controller(PatientController::class)->group(function(){
            Route::post('/keluar', 'keluar'); // v1/auth/keluar
        });

        

    });
});
