<?php

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoursessController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DepartmentsController;

use Illuminate\Support\Facades\Route;
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



Route::get('/', function () {
    $d_count = DB::select('SELECT COUNT(id) AS COUNT FROM doctors');
    $s_count = DB::select('SELECT COUNT(id) AS COUNT FROM students');
    $c_count = DB::select('SELECT COUNT(id) AS COUNT FROM courses');
    $e_count = DB::select('SELECT COUNT(id) AS COUNT FROM employees');
    $de_count = DB::select('SELECT COUNT(id) AS COUNT FROM departments');

    return view('welcome')->with(['d_count'=> $d_count,'s_count'=>$s_count,'c_count'=>$c_count,'e_count'=>$e_count,'de_count'=>$de_count]);
})->name('home');






Route::resource("doctors",DoctorsController::class);

Route::resource("students",StudentsController::class);

Route::resource("courses",CoursessController::class);

Route::resource("employees",EmployeesController::class);

Route::resource("departments",DepartmentsController::class);

