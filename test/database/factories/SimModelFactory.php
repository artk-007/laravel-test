<?php

namespace Database\Factories;

use App\Models\SimModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SimModel>
 */
class SimModelFactory extends Factory
{
    protected $model = SimModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => $this->faker->phoneNumber()
        ];
    }
}
