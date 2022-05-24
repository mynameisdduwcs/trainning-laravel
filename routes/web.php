<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('faculties', FacultyController::class);
Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::get('/addsubject/{id}', [StudentController::class, 'addsubject'])->name('students.addsubject');
Route::post('/savesub',[StudentController::class,'savesubject'])->name('student.savesubject');
// Route::post('/savesub', [StudentController::class, 'savesubject'])->name('student.savesubject');