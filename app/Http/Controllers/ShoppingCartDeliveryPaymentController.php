<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Output\ConsoleOutput;

class ShoppingCartDeliveryPaymentController extends Controller
{
    public function index() {
        return view('shopping_cart_delivery_payments.index');
    }

    public function store(Request $request) {
        $output = new ConsoleOutput();
        if (Session::has('shopping_cart')) {
            $shopping_cart = Session::get('shopping_cart');
            $order = new Order([
                'price' => $shopping_cart->total_price,
                'first_name' => $request->input_name,
                'last_name' => $request->input_last_name,
                'street' => $request->input_street,
                'city'  => $request->input_city,
                'postal_code'  => $request->input_psc,
                'email'  => $request->input_email,
                'phone' => $request->input_phone
            ]);
            $output->writeln($order);
            $request->session()->put('order', $order); // store order object into session

            return view('shopping_cart_delivery_payments.index', ['total_price' => $order->price]);
        } else {
            return view('shopping_cart_reviews.index');
        }
    }
}
