<?php

namespace Database\Factories;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reader_name' => $this->faker->unique()->text(20),
            'comment' => $this->faker->text(200),
            'comic_id' => Comic::all()->random()->id,
            'chacrater_rating' => $this->faker->numberBetween(0,5),
            'content_rating' => $this->faker->numberBetween(0,5),
            'style_rating' => $this->faker->numberBetween(0,5),
        ];
    }
}
