<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show($id) {
        $product = Product::findOrFail($id);

        return view('products.show', ['product' => $product]);
    }
}
