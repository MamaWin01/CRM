<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanysController;
use App\Http\Controllers\CompanyContactController;
use App\Models\CompanyContact;

//prefix : companys
//name : admin.companys.create

Route::get('/', [CompanysController::class, 'index'])->name('dashboard');
Route::get('/create', [CompanysController::class, 'create'])->name('create');
Route::get('{company}/edit', [CompanysController::class, 'edit'])->where('company', '[0-9]+')->name('edit');
Route::get('{company}', [CompanysController::class, 'show'])->where('company', '[0-9]+')->name('show');

// Route::get('{company}/employee', [CompanysController::class, 'employee'])->where('company', '[0-9]+')->name('employee');

Route::post('/', [CompanysController::class, 'store'])->name('store');
Route::put('{company}', [CompanysController::class, 'update'])->where('company', '[0-9]+')->name('update');
Route::put('{company}/logo', [CompanysController::class, 'updateProfileImage'])->where('companys', '[0-9]+')->name('update.profile-image');
Route::delete('{company}', [CompanysController::class, 'destroy'])->where('company', '[0-9]+')->name('delete');
Route::delete('{company}/logo', [CompanysController::class, 'destroyProfileImage'])->where('company', '[0-9]+')->name('delete.profile-image');

// Route::prefix('employee')->name('employee.')->group(base_path('routes/web/employee.php'));

Route::get('{company}/employee/create', [CompanyEmployeeController::class, 'create'])->where('company', '[0-9]+')->name('employee.create');
Route::post('{company}/employee', [CompanyEmployeeController::class, 'store'])->where('company','[0-9]+')->name('employee.store');
Route::put('{company}/employee', [CompanyEmployeeController::class, 'update'])->where('company', '[0-9]+')->name('employee.update');
