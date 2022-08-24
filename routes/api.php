<?php

use App\Http\Controllers\API\Employee\EmployeeController;
use App\Http\Controllers\API\Employee\EmployeeTypeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {

    Route::get('employee-type', [EmployeeTypeController::class, 'get']);
    Route::post('employee-type', [EmployeeTypeController::class, 'store']);
    Route::get('{employeeType}/employee-type', [EmployeeTypeController::class, 'show']);
    Route::patch('{employeeType}/employee-type', [EmployeeTypeController::class, 'update']);
    Route::delete('{employeeType}/employee-type', [EmployeeTypeController::class, 'destroy']);

    Route::get('employee', [EmployeeController::class, 'get']);
    Route::post('employee', [EmployeeController::class, 'store']);
    Route::get('{employee}/employee', [EmployeeController::class, 'show']);
    Route::patch('{employee}/employee', [EmployeeController::class, 'update']);
    Route::delete('{employee}/employee', [EmployeeController::class, 'destroy']);
});
