<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProspectsController;
use App\Http\Controllers\ProspectContactController;
use App\Models\ProspectContact;

//prefix : prospects
//name : admin.prospects.create

Route::get('/', [ProspectsController::class, 'index'])->name('dashboard');
Route::get('/create', [ProspectsController::class, 'create'])->name('create');
Route::get('{prospect}/edit', [ProspectsController::class, 'edit'])->where('prospect', '[0-9]+')->name('edit');
Route::get('{prospect}', [ProspectsController::class, 'show'])->where('prospect', '[0-9]+')->name('show');
Route::get('{prospect}/dashboard', [ProspectDashboardController::class, 'index'])->where('prospect', '[0-9]+')->name('prospect.dashboard');

// Route::get('{prospect}/employee', [ProspectsController::class, 'employee'])->where('prospect', '[0-9]+')->name('employee');

Route::post('/', [ProspectsController::class, 'store'])->name('store');
Route::put('{prospect}', [ProspectsController::class, 'update'])->where('prospect', '[0-9]+')->name('update');
Route::put('{prospect}/logo', [ProspectsController::class, 'updateProfileImage'])->where('prospect', '[0-9]+')->name('update.profile-image');
Route::delete('{prospect}', [ProspectsController::class, 'destroy'])->where('prospect', '[0-9]+')->name('delete');
Route::delete('{prospect}/logo', [ProspectsController::class, 'destroyProfileImage'])->where('prospect', '[0-9]+')->name('delete.profile-image');

// Route::prefix('employee')->name('employee.')->group(base_path('routes/web/employee.php'));

Route::get('{prospect}/contact/create', [ProspectContactController::class, 'create'])->where('prospect', '[0-9]+')->name('contact.create');
Route::post('{prospect}/contact', [ProspectContactController::class, 'store'])->where('prospect','[0-9]+')->name('contact.store');
Route::put('{prospect}/contact', [ProspectContactController::class, 'update'])->where('prospect', '[0-9]+')->name('contact.update');
