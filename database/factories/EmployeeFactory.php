<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $operators = ['50', '66', '93', '67'];
        return [

            'photo' => 'photos/' . 'avatar' .  rand(1,5) . '.png',
            'name' => $this->faker->name(),
            'phone' => "+380 (" . $operators[rand(0,3)]. ") " . rand(1111111,9999999),
            'email' => $this->faker->email(),
            'position_id' => rand(1,10),
            'salary' => rand(1000, 20000),
            'head' =>  $this->faker->name(),
            'date_of_employment' => $this->faker->date()
        ];
    }
}
