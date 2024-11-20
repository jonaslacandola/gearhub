<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    use HasUuids;

    protected $fillable = [
        "userId", "name", "description", "price", "images"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
