<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->text(30),
            'comic_slug' => Str::slug($this->faker->text(30)),
            'summary' => $this->faker->text(500),
            'author_id' => Author::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'image' => 'default.jpg',
            'is_complete' => $this->faker->boolean()
        ];
    }
}
