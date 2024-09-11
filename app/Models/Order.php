<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount',
        'order_date'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function status()
    {
        return $this->hasMany(status::class);
    }
}
