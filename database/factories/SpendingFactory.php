<?php

namespace Database\Factories;

use App\Models\Spending;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spending>
 */
class SpendingFactory extends Factory
{

    protected $model = Spending::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date'          => $this->faker->date(),
            'item'          => $this->faker->sentence(1),
            'amount'        => $this->faker->numberBetween(10,50),
            'price'         => $this->faker->randomFloat(2,-5000,-100)
        ];
    }
}
