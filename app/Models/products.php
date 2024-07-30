<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = ['productname', 
    'productprice', 
    'description',
    'quantity_in_stock',
    'origin',
    'categories_id',
    'Avis_id',
    'created_at',
    'updated_at',
    'taille_id', 
    "couleur_id",
];

    public function image_cover()
    {
        return $this->hasMany(image_product::class);
    }
}
