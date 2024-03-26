<?php

namespace App\Rules;

use App\Models\IngredientProduct;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class ProductIngredientRule implements ValidationRule
{
    public function __construct(private int $productId) {}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {
        $count = IngredientProduct::whereIn('ingredient_id', $value)->where('product_id', $this->productId)->count();
        if($count != count($value)) {
            $fail($attribute . '.invalid_ingredients');
        }
    }
}
