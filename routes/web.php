<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


//Routing Controller
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestapiController;

use App\Models\Unit;

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
//Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
// Route::put('/profile/update', [ProfileController::class, 'update'])->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//Portal
Route::get('/', [PortalController::class, 'index'])->middleware('auth');
Route::get('/portal', [PortalController::class, 'index'])->middleware('auth');
Route::get('/submenu/{id}/{nama}', [PortalController::class, 'submenu'])->middleware('auth');

//Home
Route::get('/home', [PortalController::class, 'index'])->middleware('auth');

//Login Method
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//Test Api
Route::get('/testapi/{id}', [RegisterController::class, 'getAPIatasan']);
Route::get('/syncdatabase', [TestapiController::class, 'syncdatabase']);



Route::get('/getunit', function () {
    $data = Unit::All();
    $datauser = DB::connection('breeder')->table('tb_user')->get();
    echo json_encode($datauser);
});

Route::get('/checkdb', function () {
    try {
        DB::connection()->getPdo();
        return "Connected successfully to the database!";
    } catch (\Exception $e) {
        return "Database connection failed: " . $e->getMessage();
    }
});
