<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient',
        'image_url'
    ];

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class);
    }
}
