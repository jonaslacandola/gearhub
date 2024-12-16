<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    use HasUuids;

    protected $fillable = [
        'name', 'description', 'price', 'images', 'categoryId'
    ];

    public function carts() {
        return $this->belongsToMany(Cart::class, 'cart_product', 'productId', 'cartId')->withPivot('quantity');
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_product', 'productId', 'orderId')->withPivot('quantity');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
