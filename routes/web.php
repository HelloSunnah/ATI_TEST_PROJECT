<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\DepartmentController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


   //messages
   Route::prefix('message')->name('message.')->group(function (){
      Route::get('/', [MessageController::class, 'index'])->name('index');
      Route::post('/store', [MessageController::class, 'store'])->name('store');
      Route::get('/delete/{id}', [MessageController::class, 'delete'])->name('delete');
   });

     //employees
     Route::prefix('employee')->name('employee.')->group(function (){
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
     });


    Route::get('/department-employees', [DepartmentController::class, 'showDepartmentEmployees'])->name('show.department.employees');
    Route::get('/get-department-employees', [DepartmentController::class, 'getDepartmentEmployees'])->name('get.department.employees');


    Route::get('/generate-slip', [SalaryController::class, 'create'])->name('salaries.create');
    Route::post('/generate-slip', [SalaryController::class, 'generateSlip'])->name('salaries.generateSlip');
    Route::post('/generate-slip/pdf', [SalaryController::class, 'generatePdf'])->name('salaries.generatePdf');

    // Department Crud
    Route::prefix('departments')->name('departments.')->group(function (){
    Route::get('/', [DepartmentController::class, 'index'])->name('index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('create');
    Route::post('store', [DepartmentController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [DepartmentController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
    });

    Route::get('report/summary', [ReportController::class, 'summaryReport'])->name('report.summary');


});

require __DIR__.'/auth.php';
