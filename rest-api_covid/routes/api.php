<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
 

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

# Get All Resource
Route::get('/patients', [PatientController::class, 'index']);

# Add Resource
Route::post('/patients', [PatientController::class, 'store']);

# Get Detail Resource
Route::get('/patients/{id}', [PatientController::class, 'show']);

# Edit Resource
Route::put('/patients/{id}', [PatientController::class, 'update']);

# Delete Resource
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);

# Search Resource By Name   
Route::get('/patients/search/{id}', [PatientController::class, 'search']);

#Get Positive Resource
Route::get('/patients/status/positive', [PatientController::class, 'positive']);

#Get Recovered Resource
Route::get('/patients/status/recovered', [PatientController::class, 'recovered']);

#Get Dead Resource
Route::get('/patients/status/dead', [PatientController::class, 'dead']);
