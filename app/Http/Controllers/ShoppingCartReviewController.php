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
        $quantity = request('products_number'); // we can get this parameter base on input in form with name='products_number'
        $update = request('update'); // we can get this parameter base on input in form with name='update'
        $product = Product::findOrFail($id);
        $shopping_cart = Session::has('shopping_cart') ? Session::get('shopping_cart') : null;
        $new_shopping_cart = new ShoppingCart($shopping_cart);

        if ($update == 'false') { // adding product from product detail page
            $new_shopping_cart->add($id, $product, $quantity);
        } else { // adding or removing number of products in shopping cart review page
            $new_shopping_cart->updateFromShoppingCart($id, $product, $quantity);
        }

        $request->session()->put('shopping_cart', $new_shopping_cart); // update shopping_cart object in session

        return view('shopping_cart_reviews.index', [
            'products' => $new_shopping_cart->products,
            'total_price' => $new_shopping_cart->total_price
        ]);
    }

    public function destroy(Request $request, $id) {
        $shopping_cart = Session::has('shopping_cart') ? Session::get('shopping_cart') : null;
        $shopping_cart->shoppingCartRemove($id); // remove product from shopping_cart object

        $request->session()->put('shopping_cart', $shopping_cart); // update shopping_cart object in session

        return view('shopping_cart_reviews.index', [
            'products' => $shopping_cart->products,
            'total_price' => $shopping_cart->total_price
        ]);
    }
}
