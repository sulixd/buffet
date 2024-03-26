<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductOrderRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;

class ProductsController extends Controller
{
    public function index(): Response {
        $paginator = Product::with('ingredients')->paginate(6);
        return Inertia::render('Products', [
            'paginator' => $paginator
        ]);
    }

    public function addToCart(ProductOrderRequest $request): Response {
        $data = $request->validated();
        $cart = Session::get('cart', []);
        $cart[] = $data;
        Session::put('cart', $cart);
        return $this->index();
    }
}
