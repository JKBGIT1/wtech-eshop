<?php

namespace App\Models;

class ShoppingCart
{
    public $products = null;
    public $total_price = 0;

    public function __construct($old_shopping_cart) {
        if ($old_shopping_cart) {
            $this->products = $old_shopping_cart->products;
            $this->total_price = $old_shopping_cart->total_price;
        }
    }

    public function add($id, $product, $quantity) {
        $stored_product = ['quantity' => 0, 'price' => $product->price, 'product' => $product];

        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $stored_product = $this->products[$id];
            }
        }

        $stored_product['quantity'] += $quantity;
        $stored_product['price'] = $stored_product['quantity'] * $product->price;
        $this->products[$id] = $stored_product;
        $this->total_price += $stored_product['price'];
    }

    public function updateFromShoppingCart($id, $product, $quantity) {
        $stored_product = $this->products[$id];
        $this->total_price -= $stored_product['price'];

        $stored_product['quantity'] = $quantity;
        $stored_product['price'] = $stored_product['quantity'] * $product->price;
        $this->total_price += $stored_product['price'];

        $this->products[$id] = $stored_product;
    }
}
