<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartReviewController extends Controller
{
    public function index(Request $request) {
        $previous_page = str_replace(url('/'), '', url()->previous());
        if ($previous_page != '/shopping_cart_delivery_details') {
            $request->session()->put('previous_page', $previous_page);
        }

        if (!Session::has('shopping_cart')) {
            return view('shopping_cart_reviews.index', [
                'products' => null,
                'total_price' => null,
                'previous_page' => Session::get('previous_page')
            ]);
        }

        $shopping_cart = Session::get('shopping_cart');
        $new_shopping_cart = new ShoppingCart($shopping_cart);
        return view('shopping_cart_reviews.index', [
            'products' => $new_shopping_cart->products,
            'total_price' => $new_shopping_cart->total_price,
            'previous_page' => Session::get('previous_page')
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
            'total_price' => $new_shopping_cart->total_price,
            'previous_page' => Session::get('previous_page')
        ]);
    }

    public function destroy(Request $request, $id) {
        $shopping_cart = Session::has('shopping_cart') ? Session::get('shopping_cart') : null;
        $shopping_cart->shoppingCartRemove($id); // remove product from shopping_cart object

        if (count($shopping_cart->products) == 0) {
            $request->session()->put('shopping_cart', null); // shopping_cart object has zero products
            return view('shopping_cart_reviews.index', [
                'products' => null,
                'total_price' => null,
                'previous_page' => Session::get('previous_page')
            ]);
        } else {
            $request->session()->put('shopping_cart', $shopping_cart); // update shopping_cart object in session
            return view('shopping_cart_reviews.index', [
                'products' => $shopping_cart->products,
                'total_price' => $shopping_cart->total_price,
                'previous_page' => Session::get('previous_page')
            ]);
        }
    }
}
