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
                'employee_id' => 'required|numeric',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|numeric|digits:10',
                'department' => 'required|string|max:255',
                'city' => 'required|string|max:255'
            ],
            [
                'required' => 'El campo :attribute es obligatorio.',
                'string' => 'El campo :attribute debe ser caracteres.',
                'numeric' => 'El campo :attribute solo admite números.',
                'max' => 'El campo :attribute no debe tener mas de 255 caracteres.',
                'digits' => 'El campo :attribute debe tener 10 digitos.'
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

        $requestArray = $request->except(['city', 'department']);
        $requestArray['birthplace'] = $request['department'] . ',' . $request['city'];
        $employee->update($requestArray);

        return redirect()->route('employees');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),
            [
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'employee_id' => 'required|numeric|unique:employees',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|numeric|digits:10',
                'department' => 'required|string|max:255',
                'city' => 'required|string|max:255'
            ],
            [
                'required' => 'El campo :attribute es obligatorio.',
                'string' => 'El campo :attribute debe ser caracteres.',
                'numeric' => 'El campo :attribute solo admite números.',
                'max' => 'El campo :attribute no debe tener mas de 255 caracteres.',
                'digits' => 'El campo :attribute debe tener 10 digitos.',
                'unique' => 'El campo :attribute ya ha sido registrado.'
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

        $requestArray = $request->except(['city', 'department']);
        $requestArray['birthplace'] = $request['department'] . ',' . $request['city'];
        Employee::create($requestArray);

        return redirect()->route('employees');
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees');
    }

    public function deleteMany(Request $request)
    {
        if($request->has('employees') && gettype($request['employees']) === 'array') {
            foreach ($request['employees'] as $employeeId) {

                $employee = Employee::find($employeeId);

                if ($employee->charge->name !== 'Presidente') {
                    $employee->delete();
                }
            }
        }

        return redirect()->route('employees');
    }
}
