<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->randomNumber(9, true),
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'address' => $this->faker->address(),
            'phone_number' => '3' . str_pad(rand(0, 20), 2, '0', STR_PAD_LEFT) . $this->faker->randomNumber(7, true),
            'birthplace' => 'Bogotá D.C. - Colombia'
        ];
    }
}
