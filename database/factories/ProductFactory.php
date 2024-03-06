<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $menus = [];

    public function __construct() {
        $this->menus = require __DIR__ . '/menus.php';
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $menu = array_rand($this->menus);
        return [
            'name' => $menu[0],
            'description' => $menu[2],
            'image_url' => $menu[1],
            'price' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
