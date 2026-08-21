<?php

use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;

Route::resource('docentes', DocenteController::class);

Route::get('/', function () {
    return view('welcome');
});
