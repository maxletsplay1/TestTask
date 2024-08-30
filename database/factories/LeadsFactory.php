<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leads>
 */
class LeadsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->Firstname(),
            'surname' => fake()->Lastname(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'description' => fake()->Text(40),
            'lead_status_id' => rand(1, 3),
        ];
    }
}
