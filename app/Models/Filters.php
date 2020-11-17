<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    public $colors = [];
    public $advantages = [];
    public $price_from = '';
    public $price_to = '';
    public $order = '';
    public $category_id = null;

    public function changeFilters($colors, $advantages, $price_from, $price_to, $order) {
        if (!$colors) {
            $this->colors = [];
        } else {
            $this->colors = $colors;
        }

        if (!$advantages) {
            $this->advantages = [];
        } else {
            $this->advantages = $advantages;
        }

        if (!$price_from) {
            $this->price_from = '';
        } else {
            $this->price_from = $price_from;
        }

        if (!$price_to) {
            $this->price_to = '';
        } else {
            $this->price_to = $price_to;
        }

        if (!$order) {
            $this->order = '';
        } else {
            $this->order = $order;
        }
    }

    public function setCategoryId($id) {
        $this->category_id = $id;
    }
}
