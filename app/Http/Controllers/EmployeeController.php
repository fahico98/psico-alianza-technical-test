<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function update(Request $request, Employee $employee)
    {
        Validator::make($request->all(),
            [
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'employee_id' => 'required|numeric|max:255',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|numeric|max:255',
                'department' => 'required|string|max:255',
                'city' => 'required|string|max:255'
            ],
            [
                'required' => 'El campo :attribute es obligatorio.',
                'string' => 'El campo :attribute debe ser caracteres.',
                'numeric' => 'El campo :attribute solo admite números.',
                'max' => 'El campo :attribute no debe tener mas de 255 caracteres.',
            ],
            [
                'name' => 'nombres',
                'lastname' => 'apellidos',
                'employee_id' => 'identificación',
                'address' => 'dirección',
                'phone_number' => 'número de teléfono',
                'department' => 'departamento',
                'city' => 'ciudad'
            ]
        )->validate();

        $requestArray = $request->only(['name', 'lastname', 'address', 'phone_number']);
        $requestArray['birthplace'] = $request['department'] . ',' . $request['city'];
        $employee->update($requestArray);

        return redirect('employees');
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
        return redirect('employees');
    }
}
