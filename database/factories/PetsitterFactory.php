<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetSitter>
 */
class PetsitterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lastName' => fake()->lastName(),
            'firstName' => fake()->firstName(),
            'birthdate' => fake()->dateTimeBetween('-30 years', '-20 years'),
            'email' => fake()->safeEmail(),
            // 'score' => fake()->randomFloat(2,0,5), // score removed as it is not relevant here
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'petpreference' => 'dogs',        
        ];
    }
}