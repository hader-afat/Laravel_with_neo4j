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

Route::get('/',[StudentController::class,'fetchstudent'])->name('student.get');
Route::post('/add',[StudentController::class,'store'])->name('student.store');
Route::get('/create',[StudentController::class,'create'])->name('student.create');
Route::get('/edit-student/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('/update/{id}',[StudentController::class,'update'])->name('student.update');
Route::delete('/delete/{id}',[StudentController::class,'delete'])->name('student.delete');
