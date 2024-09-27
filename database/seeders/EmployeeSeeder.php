<?php

namespace Database\Seeders;

use App\Models\Charge;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    const EMPLOYEES_TO_BE_SEEDED = 100;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $charges = [
            'Director creativo',
            'Project manager',
            'Asistente legal',
            'Director comercial',
            'Mercaderista',
            'Administrativo',
            'Community manager',
            'Diseñador senior',
            'Diseñador junior',
            'Desarrollador back-end',
            'Lider técnico',
            'Asistente contable'
        ];

        $areas = [
            'Marketing y estrategias',
            'Desarrollo de software',
            'Legar',
            'Contabilidad',
            'Diseño de productos',
            'Administración',
            'Comercial',
            'Consultoría'
        ];

        $roles = [
            'Jefe',
            'Colaborador'
        ];

        $presidentCharge = Charge::create([
            'name' => 'Presidente',
            'area' => 'Administración',
            'role' => 'Jefe'
        ]);

        $president = Employee::factory()
            ->make(['charge_id' => $presidentCharge->id]);

        $president->save();

        for ($i = 0; $i < self::EMPLOYEES_TO_BE_SEEDED; $i++) {

            $charge = Charge::create([
                'name' => $charges[rand(0, count($charges) - 1)],
                'area' => $areas[rand(0, count($areas) - 1)],
                'role' => $roles[rand(0, count($roles) - 1)]
            ]);

            $boss = Employee::whereHas('charge', function($query){
                    $query->where('role', '=', 'Jefe');
                })
                ->inRandomOrder()
                ->first();

            $empleado = Employee::factory()
                ->make([
                    'charge_id' => $charge->id,
                    'boss_id' => $boss->id
                ]);

            $empleado->save();
        }
    }
}
