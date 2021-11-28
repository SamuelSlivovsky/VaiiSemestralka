<?php

use App\Http\Controllers\PathController;
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

Route::get('/cesty', [PathController::class, 'index']);

require __DIR__ . '/auth.php';
