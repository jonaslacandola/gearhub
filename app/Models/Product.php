<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    use HasUuids;

    protected $fillable = [
        'name', 'description', 'price', 'images', 'category'
    ];

    public function carts() {
        return $this->belongsToMany(Cart::class, 'cart_product', 'productId', 'cartId')->withPivot('quantity');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
