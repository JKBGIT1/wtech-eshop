<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['colors', 'images'];
    protected $casts = [
        'colors' => 'array',
        'images' => 'array'
    ];

    public function categories() {
        $this->belongsTo('App\Models\Category');
    }

    public function setImages($images) {
        foreach ($images as $image) {
            $this->images()->create($image);
        }
    }
}
