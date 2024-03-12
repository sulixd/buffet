<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        echo "Creating ingredients\n";
        Ingredient::factory(15)->create();
        echo "Creating products\n";
        Product::factory(15)->create()->each(function($product) {
            for($i = 0; $i < rand(3, 7); $i++) {
                echo "Attaching random ingredient to product\n";
                $product->ingredients()->attach(Ingredient::inRandomOrder()->first()->id);
            }
        });
        echo "Creating users\n";
        User::factory(10)->create();
    }
}
