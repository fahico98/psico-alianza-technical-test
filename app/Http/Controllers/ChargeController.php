<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChargeController extends Controller
{
    public function update(Request $request, Charge $charge)
    {
        Validator::make($request->all(),
            [
                'employee_id' => 'required|numeric|exists:employees,employee_id',
                'name' => 'required|string|max:255',
                'area' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'boss_employee_id' => 'required|numeric|exists:employees,employee_id'
            ],
            [
                'required' => 'El campo :attribute es obligatorio.',
                'string' => 'El campo :attribute debe ser caracteres.',
                'numeric' => 'El campo :attribute solo admite números.',
                'max' => 'El campo :attribute no debe tener mas de 255 caracteres.',
                'exists' => 'El campo :attribute no se encuentra registrado.'
            ],
            [
                'employee_id' => 'identificación del empleado',
                'area' => 'area',
                'name' => 'nombre del cargo',
                'role' => 'rol',
                'boss_employee_id' => 'identificación del jefe'
            ]
        )->validate();

        $chargeEmployee = $charge->employee;
        $requestEmployee = Employee::where('employee_id', '=', $request['employee_id'])
            ->first();

        if ($chargeEmployee->id !== $requestEmployee->id) {

            $tempBossId = $chargeEmployee->boss_id;

            $chargeEmployee->charge_id = "";
            $chargeEmployee->boss_id = "";
            $chargeEmployee->save();

            $requestEmployee->charge_id = $charge->id;
            $requestEmployee->boss_id = $tempBossId;
            $requestEmployee->save();

            $chargeEmployee = clone $requestEmployee;
        }

        $chargeBoss = $chargeEmployee->boss;
        $requestBoss = Employee::where('employee_id', '=', $request['boss_employee_id'])
            ->first();

        if ($chargeBoss->id !== $requestBoss->id) {
            $chargeEmployee->boss_id = $requestBoss->id;
            $chargeEmployee->save();
        }

        $charge->update($request->only(['name', 'role', 'area']));

        return redirect()->route('charges');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),
            [
                'employee_id' => 'required|numeric|exists:employees,employee_id',
                'name' => 'required|string|max:255',
                'area' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'boss_employee_id' => 'required|numeric|exists:employees,employee_id'
            ],
            [
                'required' => 'El campo :attribute es obligatorio.',
                'string' => 'El campo :attribute debe ser caracteres.',
                'numeric' => 'El campo :attribute solo admite números.',
                'max' => 'El campo :attribute no debe tener mas de 255 caracteres.',
                'exists' => 'El campo :attribute no se encuentra registrado.'
            ],
            [
                'employee_id' => 'identificación del empleado',
                'area' => 'area',
                'name' => 'nombre del cargo',
                'role' => 'rol',
                'boss_employee_id' => 'identificación del jefe'
            ]
        )->validate();

        $employee = Employee::where('employee_id', '=', $request['employee_id'])
            ->first();

        $boss = Employee::where('employee_id', '=', $request['boss_employee_id'])
            ->first();

        $charge = Charge::create($request->only(['name', 'role', 'area']));

        $employee->charge_id = $charge->id;
        $employee->boss_id = $boss->id;
        $employee->save();

        return redirect()->route('charges');

        // 106511473
        // 953994598
    }

    public function delete(Charge $charge)
    {
        if (isset($charge->employee)) {
            $chargeEmployee = $charge->employee;
            $chargeEmployee->charge_id = "";
            $chargeEmployee->boss_id = "";
            $chargeEmployee->save();
        }

        $charge->delete();

        return redirect()->route('charges');
    }

    public function deleteMany(Request $request)
    {
        if($request->has('employees') && gettype($request['employees']) === 'array') {
            foreach ($request['employees'] as $employeeId) {

                $employee = Employee::find($employeeId);

                if ($employee && isset($employee->charge)) {

                    $employee->charge_id = "";
                    $employee->boss_id = "";

                    $employee->save();

                    $employee->charge->delete();
                }
            }
        }

        return redirect()->route('charges');
    }
}
