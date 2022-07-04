<?php

use App\Http\Controllers\ClientController;
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
//Crear ruta client
Route::resource('client', ClientController::class);
Route::get('/', [ClientController::class, 'index']);
Route::get('download-pdf', [ClientController::class, 'createPDF'])->name('download-pdf');