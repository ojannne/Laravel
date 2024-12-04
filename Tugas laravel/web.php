<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\SantriController;

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
    return view('welcome');
});

//Tambahkan route baru di routes/web.php
Route::get('salam', function () {
    return ('Assalamulaikum Sobat,Selamat Belajar Laravel Di PeTIK Jombang II');
});
//Tambahkan route baru di routes/web.php
Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi)
{
return 'Nama Pegawai : '.$nama.'<br/>Departemen : '.$divisi;
});

// raouting view kondisi
Route::get('/kabar', function () {
    return view('kondisi');
});
// raouting datasantri
Route::get('/santri', [SantriController::class, 'dataSantri']
);
