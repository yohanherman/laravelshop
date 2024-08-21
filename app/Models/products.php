<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'productname',
        'productprice',
        'description',
        'origin',
        'categories_id',
        // 'Avis_id',
        'status',
        'created_at',
        'updated_at',
    ];


    public function cart()
    {
        // return $this->belongsTo(cart::class);
        return $this->hasOne(Cart::class, 'product_id');
    }


    public function image_cover()
    {
        return $this->hasMany(image_product::class);
    }
}
