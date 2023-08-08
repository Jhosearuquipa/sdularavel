<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
   return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/add', [StudentController::class, 'create'])->name('students.add');
Route::post('students/store', [StudentController::class, 'store'])->name('students.store');

Route::put('students/{id}/destroy', [StudentController::class, 'destroy'])->name('students.destroy');
Route::put('students/{id}/update', [StudentController::class, 'update'])->name('students.update');

Route::get('students/{id}/show', [StudentController::class, 'show'])->name('students.show');
Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');



Route::post('students/import', [StudentController::class, 'importFile'])->name('students.import');

//Course
Route::get('courses/add', [CourseController::class, 'create'])->name('courses.add');
Route::post('courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{id}/show', [CourseController::class, 'show'])->name('courses.show');
Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('courses/{id}/update', [CourseController::class, 'update'])->name('courses.update');


Route::put('courses/{id}/destroy', [CourseController::class, 'destroy'])->name('courses.destroy');


Route::post('courses/import', [CourseController::class, 'importFile'])->name('courses.import');

//Course-Students
Route::get('courses/{id}/enrollments', [EnrollmentController::class, 'create'])->name('enrollments.add');

Route::post('courses/{id}/enrollments/import', [EnrollmentController::class, 'importFile'])->name('enrollments.import');