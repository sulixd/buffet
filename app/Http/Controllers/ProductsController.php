<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ProductsController extends Controller
{
    public function index(): Response {
        $paginator = Product::paginate(6);
        return Inertia::render('Products', [
            'paginator' => $paginator
        ]);
    }

    public function product($id): Response {
        $product = Product::with('ingredients')->findOrFail($id);
        return Inertia::render('Product', compact('product'));
    }
}
