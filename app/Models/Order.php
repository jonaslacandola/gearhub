<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUuids;

    protected $fillable = [
        'userId', 'total', 'status', 'payment_intent', 'payment_status', 'payment_method', 'name', 'email', 'address', 'city', 'country', 'refund', 'refund_status', 'refund_reason', 'refund_completed_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'order_product', 'orderId', 'productId')->withPivot('quantity');
    }
}
