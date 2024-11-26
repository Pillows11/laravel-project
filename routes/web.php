<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DepartmentAdminController;
use App\Http\Controllers\GradeAdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentAdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/contact', [ContactController::class,'controll']);

Route::get('/students', [StudentController::class,'index']);

Route::get('/grades', [GradeController::class,'index']);

Route::get('/departement', [DepartementController::class,'index']);

Route::get('/dashboard', [DashboardController::class,'index']);

Route::get('/department-admin', [DepartmentAdminController::class, 'index']);
Route::get('/student-admin', [StudentAdminController::class, 'index']);
Route::get('/grade-admin', [GradeAdminController::class, 'index']);
