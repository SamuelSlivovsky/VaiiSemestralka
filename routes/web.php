<?php

use App\Http\Controllers\AddRoute;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PathController;
use App\Models\Equipment;
use App\Models\Path;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tutorials', function () {
    return view('tutorials');
});
Route::get('/lezenie-na-slovensku', function () {
    return view('lezSVK');
});
Route::get('/vybavenie', [EquipmentController::class, 'index']);

Route::get('/cesty', [PathController::class, 'index']);

Route::get('/pridaj', function () {
    return view('pridaj');
});

Route::post('add', [PathController::class, 'addRoute']);
Route::get('delete/{id}', [PathController::class, 'delete']);
Route::post('add', [EquipmentController::class, 'addEquip']);
Route::get('delete-eq/{id}', [EquipmentController::class, 'delete']);

require __DIR__ . '/auth.php';
