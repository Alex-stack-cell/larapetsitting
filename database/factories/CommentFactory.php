<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owner_id'=>random_int(1,5),
            'petsitter_id'=>random_int(1,5),
            'prestation_id'=>random_int(1,5),
            'title'=>fake()->sentence(3),
            'description'=>fake()->paragraph(4),
            'createdAt'=>fake()->dateTime(),
            'score'=>fake()->numberBetween(0,5),
        ];
    }
}