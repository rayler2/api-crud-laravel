<?php

use App\Http\Controllers\MuserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getmusers', [MuserController::class, 'get_all_use']);
Route::post('/create', [MuserController::class, 'create_user']);
Route::patch('update/{id}', [MuserController::class, 'update_user']);
Route::delete('delete/{id}', [MuserController::class, 'delete_user']);