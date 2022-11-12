<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\EmployessController;
use App\Http\Controllers\ServiceResource;
use App\Http\Controllers\WorkingtimeController;


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




    // Clients
    Route::apiResource('clients', ClientsController::class);

    // Employess
    Route::apiResource('employesses', EmployessController::class);

    // Workinghour
    Route::apiResource('workingtime', WorkingtimeController::class);

    // Appointments
    Route::apiResource('appointments', AppointmentsController::class);

    // Services
    Route::apiResource('services', ServiceResource::class);



