<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $menus = [];

    public function __construct(...$args) {
        parent::__construct(...$args);
        $this->menus = require __DIR__ . '/menus.php';
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $menu = $this->menus[array_rand($this->menus)];
        return [
            'name' => $menu[0],
            'description' => $menu[2],
            'image_url' => $menu[1],
            'price' => $this->faker->numberBetween(300, 1000),
        ];
    }
}
