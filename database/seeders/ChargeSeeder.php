<?php

namespace Database\Seeders;

use App\Models\Charge;
use Illuminate\Database\Seeder;

class ChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
            'Asistente contable',
            'Presidente'
        ];

        foreach ($charges as $charge) {
            Charge::create(['name' => $charge]);
        }
    }
}
