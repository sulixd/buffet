<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class ProductsController extends Controller
{
    public function index(): \Inertia\Response {
        $paginator = Product::paginate(6);
        return Inertia::render('Products', [
            'paginator' => $paginator
        ]);
    }
}
