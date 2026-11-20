<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;



// 1. ROUTE UTAMA & DASHBOARD
Route::get('/', function () {
    return redirect('/admin/dashboard');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');

// 2. MENU 1: STUDENT (SISWA)
Route::get('/admin/students', [StudentController::class, 'index'])->name('student.index');
Route::post('/admin/students', [StudentController::class, 'store'])->name('student.store');

// 3. MENU 2: CLASSROOM (KELAS)
Route::get('/admin/classroom', [ClassroomController::class, 'index'])->name('classroom.index');
Route::post('/admin/classroom', [ClassroomController::class, 'store'])->name('classroom.store');

// 4. MENU 3: SUBJECT (MATA PELAJARAN)
Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('subject.index');
Route::post('/admin/subjects', [SubjectController::class, 'store'])->name('subject.store');

// 5. MENU 4: TEACHER (GURU)
Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('/admin/teachers', [TeacherController::class, 'store'])->name('teacher.store');
