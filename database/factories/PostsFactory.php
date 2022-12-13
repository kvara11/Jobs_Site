<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'author' => $this->faker->name() . ' ' . $this->faker->lastName(),
            'company_name' => $this->faker->company(),
            'country' => $this->faker->country(),
            'register_time' => $this->faker->dateTime()
        ];
    }
}
