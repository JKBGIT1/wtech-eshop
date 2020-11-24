<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartDeliveryDetailController extends Controller
{
    public function index() {
        if (Session::has('shopping_cart')) {
            if (Session::has('order')) {
                $order = Session::get('order');
                return view('shopping_cart_delivery_details.index', ['order' => $order]);
            }
            return view('shopping_cart_delivery_details.index', ['order' => null]);
        } else {
            return view('shopping_cart_reviews.index', [
                'products' => null,
                'total_price' => null,
                'previous_page' => Session::get('previous_page')
            ]);
        }
    }
}
