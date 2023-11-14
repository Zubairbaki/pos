<?php

namespace Database\Factories;

use App\Models\Costomer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CostomerFactory extends Factory
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
            'shopname' => $faker->company,
            'image' => $faker->imageUrl(),
            'account_holder' => $faker->name,
            'account_number' => $faker->bankAccountNumber,
            'bank_name' => $faker->word,
            'bank_branch' => $faker->word,
            'city' => $faker->city,

        ];
    }
}
