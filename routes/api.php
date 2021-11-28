<?php

use App\Http\Controllers\PathController;
use App\Models\Path;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->post('/tries', [PathController::class, 'changeTries']);
Route::middleware('auth:sanctum')->post('/ascendType', [PathController::class, 'changeAscend']);
