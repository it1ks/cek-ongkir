<?php

use App\Http\Controllers\OngkirController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', [OngkirController::class, 'index']);