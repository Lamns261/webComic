<?php

namespace Database\Factories;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->text(50),
            'name_slug' => Str::slug($this->faker->text(50)),
            'content' => $this->faker->text(5000),
            'comic_id' => Comic::all()->random()->id,
        ];
    }
}
