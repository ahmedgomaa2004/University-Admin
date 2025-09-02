<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoursessController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\DB;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name("home");

// Dashboard API routes
Route::middleware('auth')->group(function () {
    Route::get('/api/students-per-department', [DashboardController::class, 'getStudentsPerDepartment'])->name('api.students-per-department');
    Route::get('/api/global-search', [DashboardController::class, 'globalSearch'])->name('api.global-search');
});

Route::resource("doctors",DoctorsController::class)->middleware(['auth', 'verified']);

Route::resource("students",StudentsController::class)->middleware(['auth', 'verified']);

Route::resource("courses",CoursessController::class)->middleware(['auth', 'verified']);

Route::resource("employees",EmployeesController::class)->middleware(['auth', 'verified']);

Route::resource("departments",DepartmentsController::class)->middleware(['auth', 'verified']);

Route::resource("users",UsersController::class)->middleware(['auth', 'verified']);