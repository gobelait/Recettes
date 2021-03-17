<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title' => 'Le Faux Titre',
            'content' => $this->faker->text,
            'ingredients' => $this->faker->text,
            'url' => $this->faker->text(200),
            'tags' => $this->faker->text,
            'date' => now(),
            'status' => $this->faker->text(45),
        ];
    }

}
