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
Route::post('/buy', [NavController::class, 'buy']);
Route::post('/buy-summary-save', [NavController::class, 'buySummarySave']);

Route::get('/contact-email-sent', [NavController::class, 'sent']);
Route::get('/purchase-request-sent', [NavController::class, 'prsent']);
Route::get('/buy-summary', [NavController::class, 'buySummary']);

Route::get('/landing', [NavController::class, 'landing']);
Route::get('/generic', [NavController::class, 'generic']);
Route::get('/elements', [NavController::class, 'elements']);
Route::get('/buy', [NavController::class, 'buyform']);
Route::get('/', [NavController::class, 'home']);