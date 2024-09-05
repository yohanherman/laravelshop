<?php

namespace App\Models;

use Doctrine\DBAL\Driver\Mysqli\Initializer\Options;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'productname',
        'productprice',
        'description',
        'origin',
        'categories_id',
        'product_discount',
        'status',
        'created_at',
        'updated_at',
        'cover'
    ];


    public function cart()
    {
        return $this->hasOne(Cart::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(images::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'product_id');
    }
}
