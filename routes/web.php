<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavController;

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
Route::post('/contact', [NavController::class, 'contact']);
Route::get('/contact_email_sent', [NavController::class, 'sent']);
Route::get('/purchase_request_sent', [NavController::class, 'prsent']);

Route::get('/landing', [NavController::class, 'landing']);
Route::get('/generic', [NavController::class, 'generic']);
Route::get('/elements', [NavController::class, 'elements']);
Route::get('/buy', [NavController::class, 'buyform']);
Route::get('/', [NavController::class, 'home']);