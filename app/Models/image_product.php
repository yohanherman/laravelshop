<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_product extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(products::class ,'image_product_id','id');
    }
}
