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

        $stored_product['quantity'] += $quantity; // increase quantity of product
        $stored_product['price'] = $stored_product['quantity'] * $product->price; // calculate total price for this product
        $this->products[$id] = $stored_product; // store product into array based on key value $id
        $this->total_price += $stored_product['price']; // add total price of product to total price of shopping cart
    }

    public function updateFromShoppingCart($id, $product, $quantity) {
        $stored_product = $this->products[$id];
        $this->total_price -= $stored_product['price']; // deduct old total price of product from total price of shopping cart

        $stored_product['quantity'] = $quantity; // set new quantity of product based on user choice
        $stored_product['price'] = $stored_product['quantity'] * $product->price; // calculate new total price of product based on new quantity of product in shopping cart
        $this->total_price += $stored_product['price']; // add new total price of product to total price of shopping cart

        $this->products[$id] = $stored_product;
    }

    public function shoppingCartRemove($id) {
        $this->total_price -= $this->products[$id]['price'];
        unset($this->products[$id]); // this removes product from products array in shopping_cart object
    }
}
