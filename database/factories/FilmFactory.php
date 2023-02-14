<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * The name of the factory`s corresponding model.
     * @var string
     */
    protected $model = Film::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(3),
            'desc'  => fake()->paragraph(),
            'cover' => fake()->imageUrl(200,400, 'films'),
        ];
    }
}
