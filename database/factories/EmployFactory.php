<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employ>
 */
class EmployFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [

            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'experience' => $faker->text,
            'image' => $faker->imageUrl(),
            'salary' => $faker->randomNumber(5),
            'vacation' => $faker->randomNumber(2),
            'city' => $faker->city,

        ];
    }
}
