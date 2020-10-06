<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_murid' => $this->faker->name(),
            'status_murid' => $this->faker->boolean(),
            'nilai_ujian' => $this->faker->numberBetween(0, 100),
            'nilai_pts' => $this->faker->numberBetween(0, 100),
            'nilai_uas' => $this->faker->numberBetween(0, 100),
        ];
    }
}
