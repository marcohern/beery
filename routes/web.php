<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyController;
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
Route::get('/contact-email-sent', [NavController::class, 'sent']);
Route::get('/landing', [NavController::class, 'landing']);
Route::get('/generic', [NavController::class, 'generic']);
Route::get('/elements', [NavController::class, 'elements']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'loginform']);

Route::post('/buy', [BuyController::class, 'buy']);
Route::post('/buy-summary-save', [BuyController::class, 'buySummarySave']);
Route::get('/purchase-request-sent', [BuyController::class, 'prsent']);
Route::get('/buy-summary', [BuyController::class, 'buySummary']);
Route::get('/buy', [BuyController::class, 'buyform']);
Route::post('/buy-notify', [BuyController::class, 'notify']);

Route::get('/', [NavController::class, 'home']);