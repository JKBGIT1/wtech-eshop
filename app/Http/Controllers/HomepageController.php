<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller
{
    public function index() {
        $all_categories = [];

        for ($i = 1; $i <= 6; $i++) {
            $products_list = Category::findOrFail($i)->products()->limit(2)->get();
            $all_categories[$i] = $products_list;
        }

        return view('welcome', [
            'message' => null,
            'all_categories' => $all_categories
        ]);
    }

    public function store(Request $request) {
        if (Session::has('shopping_cart') && Session::has('order')) {
            $shopping_cart = Session::get('shopping_cart');
            $order = Session::get('order');

            $delivery = request('delivery');
            $delivery_price = $this->getDeliveryPrice($delivery);

            $payment = request('payment');
            $payment_price = $this->getPaymentPrice($payment);

            $user = Auth::user();
            if ($user) { // if some user is loged in, then map this order to him.
                $order->user_id = $user->getAuthIdentifier();
            }

            // make timestamp $order->ordered_at = ...
            $order->ordered_at = now();
            $order->price += ($delivery_price + $payment_price);
            $order->delivery_id = (int)$delivery;
            $order->payment_id = (int)$payment;
            $order->timestamps = false;

            $order->save();

            $order_id = $order->id;

            foreach($shopping_cart->products as $product) {
                // This lines store recored about N:M relation ship between orders and products
                $order_product = new OrderProduct();
                $order_product->quantity = $product['quantity'];
                $order_product->order_id = $order_id;
                $order_product->product_id = $product['product']['id'];
                $order_product->timestamps = false;
                $order_product->save();
            }

            $request->session()->put('shopping_cart', null);
            $request->session()->put('order', null);
        }

        $all_categories = [];

        for ($i = 1; $i <= 6; $i++) {
            $products_list = Category::findOrFail($i)->products()->limit(2)->get();
            $all_categories[$i] = $products_list;
        }

        return view('welcome', [
            'message' => 'Vaša objednávka prebehla úspešne.',
            'all_categories' => $all_categories
        ]);
    }

    public function getDeliveryPrice($delivery) {
        if ($delivery == '1') {
            return 4;
        } else if ($delivery == '2') {
            return 3;
        } else {
            return 0;
        }
    }

    public function getPaymentPrice($payment) {
        if ($payment == '1') {
            return 4;
        } else {
            return 0;
        }
    }
}
