<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\ProductIngredient;
use App\Models\User;
use Database\Factories\ProductIngredientFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Ingredient::factory()->create(15);
        Product::factory()->create(15)->each(function(Product $product) {
            for($i = 0; $i < rand(3, 7); $i++) {
                $product->ingredients();
            }
        });
        User::factory()->create(10);
    }
}
