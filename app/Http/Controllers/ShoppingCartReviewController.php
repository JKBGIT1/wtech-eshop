<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Output\ConsoleOutput;

class ShoppingCartReviewController extends Controller
{
    public function index() {
        if (!Session::has('shopping_cart')) {
            return view('shopping_cart_reviews.index', ['products' => null, 'total_price' => null]);
        }
        $shopping_cart = Session::get('shopping_cart');
        $new_shopping_cart = new ShoppingCart($shopping_cart);
        return view('shopping_cart_reviews.index', [
            'products' => $new_shopping_cart->products,
            'total_price' => $new_shopping_cart->total_price
        ]);
    }

    public function update(Request $request, $id) {
        $quantity = request('products_number');
        $update = request('update');
        $product = Product::findOrFail($id);
        $shopping_cart = Session::has('shopping_cart') ? Session::get('shopping_cart') : null;
        $new_shopping_cart = new ShoppingCart($shopping_cart);

        if ($update == 'false') {
            $new_shopping_cart->add($id, $product, $quantity);
        } else {
            $new_shopping_cart->updateFromShoppingCart($id, $product, $quantity);
        }

        $request->session()->put('shopping_cart', $new_shopping_cart);

        return view('shopping_cart_reviews.index', [
            'products' => $new_shopping_cart->products,
            'total_price' => $new_shopping_cart->total_price
        ]);
    }
}
