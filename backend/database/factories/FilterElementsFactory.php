<?php

namespace Database\Factories;

use App\Models\FilterElements;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FilterElements>
 */
class FilterElementsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FilterElements::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'qyteti' => fake()->name() ,
            'lagjia' => fake()->streetAddress(),
            'lloji' => fake()->name(),
            'statusi' => fake()->name(),
            'cmimi_min' => fake()->numerify(),
            'cmimi_max' => fake()->numerify(),
            'hapsira' => fake()->numerify(),
            'nr_dhomave' => fake()->numerify(),
            'nr_banjove' => fake()->numerify(),
            'mobiluar' => fake()->boolean(),
        ];
    }
}
