<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'first_name',
        'last_name',
        'street',
        'city',
        'postal_code',
        'email',
        'phone',
        'delivery_id',
        'payment_id'
    ];

    public function products() {
        return $this->belongsToMany('App\Model\Product');
    }
}
