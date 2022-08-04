<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestation>
 */
class PrestationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'petsitter_id'=>random_int(1,5),
            'dateStart' => fake()->dateTimeBetween('now', '+ 6 months'),
            'dateEnd' => fake()->dateTimeBetween('+2 days', '+8 months')
        ];
    }
}