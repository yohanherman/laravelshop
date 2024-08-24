<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "taille_id",
        "user_id",
        "colors_id",
        "quantity"
    ];


    public function products()
    {
        return $this->belongsTo(products::class, 'product_id');
    }
}
