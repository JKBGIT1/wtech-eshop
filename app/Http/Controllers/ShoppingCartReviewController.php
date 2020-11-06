<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartReviewController extends Controller
{
    public function index() {
        return view('shopping_cart_reviews.index');
    }
}
