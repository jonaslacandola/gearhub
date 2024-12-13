<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasUuids;

    protected $fillable = [
        'category'
    ];

    public function products() {
        $this->belongsToMany(Product::class, 'category_product', 'categoryId', 'productId');
    }
}
