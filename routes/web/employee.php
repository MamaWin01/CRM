<?php

use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class, 'index'])->name('dashboard');
