<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::post('/report/policy', [App\Http\Controllers\API\ReportController::class, 'policyReport']);
    Route::post('/report/patient', [App\Http\Controllers\API\ReportController::class, 'patientReport']);
    Route::post('/report/case', [App\Http\Controllers\API\ReportController::class, 'caseReport']);

    Route::post('/chart/policy', [App\Http\Controllers\API\ChartController::class, 'policyChart']);
    Route::post('/chart/case', [App\Http\Controllers\API\ChartController::class, 'caseChart']);
    Route::post('/chart/patient', [App\Http\Controllers\API\ChartController::class, 'patientChart']);

    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});
