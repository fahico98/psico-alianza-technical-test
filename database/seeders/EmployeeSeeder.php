<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Charge;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    const EMPLOYEES_TO_BE_SEEDED = 100;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $administrationArea = Area::where('name', '=', 'Administración')
            ->first();

        $presidentCharge = Charge::where('name', '=', 'Presidente')
            ->first();

        $bossRole = Role::where('name', '=', 'Jefe')
            ->first();

        $president = Employee::factory()->make([
            'area_id' => $administrationArea->id,
            'charge_id' => $presidentCharge->id,
            'role_id' => $bossRole->id
        ]);

        $president->save();

        for ($i = 0; $i < self::EMPLOYEES_TO_BE_SEEDED; $i++) {

            $charge = Charge::where('name', '<>', 'Presidente')
                ->inRandomOrder()
                ->first();

            $role = Role::inRandomOrder()
                ->first();

            $area = Area::inRandomOrder()
                ->first();

            $boss = Employee::where('role_id', '=', $bossRole->id)
                ->inRandomOrder()
                ->first();

            $empleado = Employee::factory()->make([
                'area_id' => $area->id,
                'charge_id' => $charge->id,
                'role_id' => $role->id,
                'boss_id' => $boss->id
            ]);

            $empleado->save();
        }
    }
}
