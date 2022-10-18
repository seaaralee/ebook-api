<?php

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

Route::get('/coba', function () {
    return 'Muti Cantik';
});

Route::get('/coba1', function(){
    return [
        'nama' => 'Mutia Rani Zahra Meilani',
        'kelas' => 'XII RPL 5',
        'nis' => 3103120153
    ];
});

Route::get('/coba2', function(){
    return response()->json (
        [
            'nama' => 'Mutia Rani Zahra Meilani',
            'kelas' => 'XII RPL 5',
            'nis' => 3103120153
        ],201
    );
});



