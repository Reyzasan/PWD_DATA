<?php

use App\Http\Controllers\StudentController;
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


Route::get('student', [StudentController::class, 'index'])->name('student.all');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');

// Route::prefix('pplg3')->group(function () {
//     Route::get('student', [StudentController::class, 'pplg3'])->name('pplg3.student');

// });
