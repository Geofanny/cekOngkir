<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ongkirController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return redirect('/cek-ongkir');
});

Route::get('/cek-ongkir', [ongkirController::class,'index']);
Route::post('/cek-ongkir', [ongkirController::class,'cekOngkir']);
