<?php

use App\Http\Controllers\ManageController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
//administrator
Route::prefix("manage")->middleware('role:administrator')->group(function () {
    Route::get('/', [ManageController::class, 'index']);
    Route::get('/dashboard', [ManageController::class, 'dashboard'])->name('manage.dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/permissions', PermissionsController::class, ['except' => 'destroy']);
    Route::resource('/roles', RoleController::class, ['except' => 'destroy']);
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
