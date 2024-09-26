<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/empleados', function () {
        return view('employees');
    })
    ->middleware(['auth'])
    ->name('employees');

Route::get('/empleados/eliminar/{employee}', function (Employee $employee) {
        return view('delete-employee-confirmation', compact('employee'));
    })
    ->middleware(['auth'])
    ->name('delete-employee-confirmation');

Route::delete('/empleados/eliminar/{employee}', [EmployeeController::class, 'delete'])
    ->middleware(['auth'])
    ->name('delete-employee');

Route::get('/empleados/editar/{employee}', function (Employee $employee) {
        return view('edit-employee-form', compact('employee'));
    })
    ->middleware(['auth'])
    ->name('edit-employee-form.blade.php');

Route::put('/empleados/actualizar/{employee}', [EmployeeController::class, 'update'])
    ->middleware(['auth'])
    ->name('update-employee');

Route::get('/cargos', function () {
    return view('charges');
})
    ->middleware(['auth'])
    ->name('charges');

require __DIR__.'/auth.php';
