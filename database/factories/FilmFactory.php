<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->unique()->bothify('DVD-###')),
            'title' => $this->faker->sentence(3),
            'genre' => $this->faker->randomElement(['Action', 'Drama', 'Comedy', 'Sci-Fi']),
            'year' => $this->faker->year(),
            'stock' => $this->faker->numberBetween(1, 10),
        ];
    }
}
