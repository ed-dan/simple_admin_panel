<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $lead_source = ["Advertisement", "Cold Call", "Online Store", "Facebook", "Instagram"];
        $operators = ['50', '66', '93', '67'];

        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "phone" => "380" . $operators[rand(0,3)]. rand(1111111,9999999),
            "source" => $lead_source[rand(0,4)],
            "employee_id" => rand(1,10)
        ];
    }
}
