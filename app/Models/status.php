<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    // pour conserver la table telle que je l'ai appelé car laravel s'attend a ce que ce soit 'statuses' au pluriel
    protected $table = 'status';
}
