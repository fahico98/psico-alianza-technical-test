<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        foreach ($areas as $area) {
            Area::create(['name' => $area]);
        }
    }
}
