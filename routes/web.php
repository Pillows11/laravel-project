<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\admin\DepartmentAdminController;
use App\Http\Controllers\admin\GradeAdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\admin\StudentAdminController;
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

// Route::get('/department-admin', [DepartmentAdminController::class, 'index']);
// Route::get('/student-admin', [StudentAdminController::class, 'index']);
// Route::get('/grade-admin', [GradeAdminController::class, 'index']);

Route::prefix('admin')->group(function () {

    Route::get('/department-admin', [DepartmentAdminController::class, 'index']); // Tetap tanpa nama

    Route::get('/grade-admin', [GradeAdminController::class, 'index']); // Tetap tanpa nama

    Route::prefix('students')->name('admin.students.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\StudentAdminController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\StudentAdminController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\StudentAdminController::class, 'store'])->name('store');
        Route::get('/edit/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'edit']);
        Route::put('/update/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'update']);
        Route::delete('/delete/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'destroy']);
    });
    Route::prefix('grades')->name('admin.grades.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\GradeAdminController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\GradeAdminController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\GradeAdminController::class, 'store'])->name('store');
        Route::get('/edit/{grade}', [\App\Http\Controllers\Admin\GradeAdminController::class, 'edit']);
        Route::put('/update/{grade}', [\App\Http\Controllers\Admin\GradeAdminController::class, 'update']);
        Route::delete('/delete/{grade}', [\App\Http\Controllers\Admin\GradeAdminController::class, 'destroy']);
    });
    Route::prefix('departements')->name('admin.departements.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DepartmentAdminController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\DepartmentAdminController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\DepartmentAdminController::class, 'store'])->name('store');
        Route::get('/edit/{departement}', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'edit']);
        Route::put('/update/{departement}', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'update']);
        Route::delete('/delete/{departement}', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'destroy']);
    });

});
