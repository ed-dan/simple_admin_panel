<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Artisan;
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




// show all employees
Route::get('/', [EmployeeController::class,'index'])->name('employee.index');

// create employee
Route::get('/employees/create',[EmployeeController::class, 'create'])->name('employee.create');

// store employee data
Route::post('/employees',[EmployeeController::class, 'store'])->name('employee.store');

// show edit form
Route::get('/employees/{employee}/edit',[EmployeeController::class, 'edit'])->name('employee.edit');

// update employee data
Route::patch('/employees/{employee}',[EmployeeController::class, 'update'])->name('employee.update');

// delete employee data
Route::delete('/employees/{employee}',[EmployeeController::class, 'destroy'])->name('employee.delete');

// must be under create and store route
// show one employee
Route::get('/employees/{employee}',[EmployeeController::class, 'show'])->name('employee.show');

Route::get('autocomplete',[App\Http\Controllers\EmployeeController::class, 'autocomplete'])->name('autocomplete');

//Route::get('/orderByTitle', [PositionController::class, 'order'])->name('position.order');

// show all positions
Route::get('/positions', [PositionController::class,'index'])->name('position.index');
// create position
Route::get('/positions/create',[PositionController::class, 'create'])->name('position.create');

// store position data
Route::post('/positions',[PositionController::class, 'store'])->name('position.store');

// show edit form
Route::get('/positions/{position}/edit',[PositionController::class, 'edit'])->name('position.edit');

// update position data
Route::patch('/positions/{position}',[PositionController::class, 'update'])->name('position.update');

// delete position data
Route::delete('/positions/{position}',[PositionController::class, 'destroy'])->name('position.delete');


//// must be under create and store route
// show one listing
Route::get('/positions/{position}',[PositionController::class, 'show'])->name('position.show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
