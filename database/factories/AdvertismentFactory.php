<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use NunoMaduro\Collision\Adapters\Phpunit\State;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisment>
 */
class AdvertismentFactory extends Factory
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
            'prestation_id'=>random_int(1,5),
            'title'=>fake()->sentence(3),
            'tags'=> 'dog, Brussels, young pet',
            'description'=>fake()->paragraph(4),
            'createdAt'=>fake()->dateTime(),
            'postCode'=>fake()->postcode(),
            'city'=>fake()->city(),
            'dateStart'=>fake()->dateTimeBetween('now','+6 months'),
            'dateEnd'=>fake()->dateTimeBetween('+2 days','+8 months'),
        ];
    }
}