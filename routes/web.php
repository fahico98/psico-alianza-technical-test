<?php

use App\Http\Controllers\ChargeController;
use App\Http\Controllers\EmployeeController;
use App\Models\Charge;
use Illuminate\Http\Request;
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

// Employees ---------------------------------------------------------------------------------------------------------------------------------------------------

Route::get('/empleados', function () {
        return view('employees.employees');
    })
    ->middleware(['auth'])
    ->name('employees');

// Crear y guardar

Route::get('/empleados/crear', function () {
        return view('employees.create-employee-form');
    })
    ->middleware(['auth'])
    ->name('create-employee');

Route::post('/empleados/guardar', [EmployeeController::class, 'store'])
    ->middleware(['auth'])
    ->name('store-employee');

// Eliminar

Route::get('/empleados/eliminar-confirmacion/{employee}', function (Employee $employee) {
        return view('employees.delete-employee-confirmation', compact('employee'));
    })
    ->middleware(['auth'])
    ->name('delete-employee-confirmation');

Route::get('/empleados/eliminar/{employee}', [EmployeeController::class, 'delete'])
    ->middleware(['auth'])
    ->name('delete-employee');

// Eliminar varios

Route::get('/empleados/eliminar-varios-confirmacion', function (Request $request) {
    return view('employees.delete-many-employees-confirmation', ['employees' => $request['employees']]);
})
    ->middleware(['auth'])
    ->name('delete-many-employees-confirmation');

Route::get('/empleados/eliminar-varios', [EmployeeController::class, 'deleteMany'])
    ->middleware(['auth'])
    ->name('delete-many-employees');

// Editar y guardar

Route::get('/empleados/editar/{employee}', function (Employee $employee) {
        return view('employees.edit-employee-form', compact('employee'));
    })
    ->middleware(['auth'])
    ->name('edit-employee');

Route::put('/empleados/actualizar/{employee}', [EmployeeController::class, 'update'])
    ->middleware(['auth'])
    ->name('update-employee');

// Charges -----------------------------------------------------------------------------------------------------------------------------------------------------

Route::get('/cargos', function () {
        return view('charges.charges');
    })
    ->middleware(['auth'])
    ->name('charges');

// Crear y guardar

Route::get('/cargos/crear', function () {
    return view('charges.create-charge-form');
})
    ->middleware(['auth'])
    ->name('create-charge');

Route::post('/cargos/guardar', [ChargeController::class, 'store'])
    ->middleware(['auth'])
    ->name('store-charge');

// Editar y guardar

Route::get('/cargos/editar/{charge}', function (Charge $charge) {
        return view('charges.edit-charge-form', compact('charge'));
    })
    ->middleware(['auth'])
    ->name('edit-charge');

Route::put('/cargos/actualizar/{charge}', [ChargeController::class, 'update'])
    ->middleware(['auth'])
    ->name('update-charge');

// Eliminar

Route::get('/cargos/eliminar-confirmacion/{charge}', function (Charge $charge) {
    return view('charges.delete-charge-confirmation', compact('charge'));
})
    ->middleware(['auth'])
    ->name('delete-charge-confirmation');

Route::get('/cargos/eliminar/{charge}', [ChargeController::class, 'delete'])
    ->middleware(['auth'])
    ->name('delete-charge');

// Eliminar varios

Route::get('/cargos/eliminar-varios-confirmacion', function (Request $request) {
    return view('charges.delete-many-charges-confirmation', ['employees' => $request['employees']]);
})
    ->middleware(['auth'])
    ->name('delete-many-charges-confirmation');

Route::get('/cargos/eliminar-varios', [ChargeController::class, 'deleteMany'])
    ->middleware(['auth'])
    ->name('delete-many-charges');

require __DIR__.'/auth.php';
