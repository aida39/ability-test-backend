<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/admin', [ContactController::class, 'admin']);
Route::delete('/delete/{contact}', [ContactController::class, 'destroy']);

// Route::get('/admin', [ContactController::class, 'admin']);
// Route::get('/search', [ContactController::class, 'search']);
// Route::get('/download', [ContactController::class, 'download']);
// Route::get('/delete', [ContactController::class, 'delete']);