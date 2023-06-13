<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\datasiswacontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return view('auth.login');
});

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'register_form']);
Route::post('register', [AuthController::class, 'register']);
Route::delete('{id}/destroy', [datasiswacontroller::class, 'destroy']);

Route::get('table', [datasiswacontroller::class, 'index']);
Route::post('table', [datasiswacontroller::class, 'store']);

Route::patch('table/{id}', [datasiswacontroller::class, 'update']);
Route::get('table/create', [datasiswacontroller::class, 'create']);
Route::get('table/{id}/edit', [datasiswacontroller::class, 'edit']);


