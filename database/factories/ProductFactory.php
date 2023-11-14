<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**

 */
class ProductFactory extends Factory
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
            'product_name' => $this->faker->word,
            'catagory_id' => $this->faker->numberBetween(1, 10),
            'supplier_id' => $this->faker->numberBetween(1, 10),
            'product_code' => $this->faker->unique()->uuid,
            'product_garage' => $this->faker->word,
            'product_image' => $this->faker->imageUrl(),
            'prodcut_store' => $this->faker->word,
            'buying_date' => $this->faker->date,
            'expire_date' => $this->faker->date,
            'buying_price' => $this->faker->randomFloat(2, 1, 100),
            'selling_price' => $this->faker->randomFloat(2, 1, 200),
        ];
    }
}
