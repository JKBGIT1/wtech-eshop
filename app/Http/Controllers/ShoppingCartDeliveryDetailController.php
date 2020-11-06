<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartDeliveryDetailController extends Controller
{
    public function index() {
        return view('shopping_cart_delivery_details.index');
    }
}
