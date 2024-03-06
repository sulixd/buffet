<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ingredients = [
            ['paradicsom', 'https://cdn.pixabay.com/photo/2013/07/12/18/19/tomato-153272_1280.png'],
            ['majonéz', 'https://pngimg.com/uploads/mayonnaise/mayonnaise_PNG86.png']
        ];
        $ingredient = $ingredients[array_rand($ingredients)];
        return [
            'ingredient' => $ingredient[0],
            'image_url' => $ingredient[1]
        ];
    }
}
