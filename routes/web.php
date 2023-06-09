<?php

use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('qrcode.create');
});
Route::group(['as' => 'qrcode.'], function () {
    Route::view('/create', 'qrcode.create')->name('create');
    Route::post('/create', [QrCodeController::class, 'store'])->name('store');
    Route::get('/{shortCode:code}', [QrCodeController::class, 'view'])->name('view');
});
