<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'width',
        'length',
        'height',
        'category_id',
        'num_of_packs',
        'colors',
        'images',
        'material',
        'description',
        'advantages'
    ];
    protected $casts = [
        'advantages' => 'array',
        'colors' => 'array',
        'images' => 'array'
    ];

    public function categories() {
        $this->belongsTo('App\Models\Category');
    }

    public function orders() {
        return $this->belongsToMany('App\Models\Order');
    }

    public function setImages($images) {
        foreach ($images as $image) {
            $this->images()->create($image);
        }
    }
}
