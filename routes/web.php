<?php

use App\Http\Controllers\AddRoute;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PathController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UserController;
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
    return redirect('index');
});


Route::get('/index', function () {
    return view('welcome');
})->name('index');


// Route::get('/tutorials', function () {
//     return view('tutorials');
// });

Route::get('/tutorials', [TutorialController::class, 'index'])->name('tutorials');
Route::get('/tutorial/{id}', [TutorialController::class, 'tutorialShow']);
Route::get('/lezenie-na-slovensku', function () {
    return view('lezSVK');
})->name('lezenie-na-slovensku');

Route::get('/vybavenie', [EquipmentController::class, 'index'])->name('vybavenie');

Route::get('/cesty', [PathController::class, 'index'])->name('cesty');
Route::get('/profil', [UserController::class, 'index'])->name('profil');
Route::get('/pridaj-cestu', function () {
    return view('pridaj');
})->name('pridaj-cestu');
Route::get('/pridaj-eq', function () {
    return view('pridaj');
})->name('pridaj-eq');

Route::get('/pridaj-tutorial', function () {
    return view('pridaj');
})->name('pridaj-tutorial');

Route::post('addR', [PathController::class, 'addRoute']);
Route::get('delete/{id}', [PathController::class, 'delete']);
Route::post('addE', [EquipmentController::class, 'addEquip']);
Route::post('addT', [TutorialController::class, 'addTutorial']);
Route::get('delete-eq/{id}', [EquipmentController::class, 'delete']);
Route::get('delete-profile', [UserController::class, 'delete']);
Route::get('delete-tutorial/{id}', [TutorialController::class, 'delete']);
Route::post('update', [UserController::class, 'updateProfile']);
require __DIR__ . '/auth.php';
