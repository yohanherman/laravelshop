<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "user_id",
        "quantity"
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
