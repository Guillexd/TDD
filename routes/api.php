<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Middleware\TimeMiddleware;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware([TimeMiddleware::class])->group(function() {
    Route::post('/calculator/addition', [CalculatorController::class, 'add']);
    Route::post('/calculator/subtraction', [CalculatorController::class, 'substract']);
    Route::post('/calculator/multiplication', [CalculatorController::class, 'multiply']);
    Route::post('/calculator/division', [CalculatorController::class, 'divide']);
    Route::post('/calculator/exponentiation', [CalculatorController::class, 'getPower']);
    Route::post('/calculator/root', [CalculatorController::class, 'getRoot']);
    Route::post('/calculator/logarithm', [CalculatorController::class, 'getLogarithm']);
    Route::post('/calculator/result', [CalculatorController::class, 'result']);
});
