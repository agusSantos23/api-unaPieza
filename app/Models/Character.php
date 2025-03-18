<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'band',
        'level',
        'ateDevilFruit',
        'whichFruit',
    ];

    protected $casts = [
        'whichFruit' => 'array',  
    ];
}
