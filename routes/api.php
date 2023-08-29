<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManageUserController;
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

//Management
Route::post('/update-user/{id}/ban', [ManageUserController::class, 'update']);
Route::post('/update-user/{id}/email', [ManageUserController::class, 'update']);
Route::post('/update-user/{id}/unit', [ManageUserController::class, 'update']);
Route::post('/update-user/{id}/name', [ManageUserController::class, 'update']);
Route::post('/update-user/{id}/rolelist', [ManageUserController::class, 'update']);
Route::post('/update-user/{id}/password', [ManageUserController::class, 'update']);
Route::post('/update-user/{id}/unit_control', [ManageUserController::class, 'update']);
Route::post('/update-user/{id}/number', [ManageUserController::class, 'update']);

//OTP api
Route::post('/otprequest', [ManageUserController::class, 'requestotp']);

// Route::post('/admin-box/{id}/change-status', 'Admin\BoxController@change_status');