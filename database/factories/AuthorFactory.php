<?php

namespace Database\Factories;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AuthorFactory extends Factory
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
            'author_slug' => Str::slug($this->faker->text(30)),
            'info' => $this->faker->text(1000),
        ];
    }
}
