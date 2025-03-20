<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevilFruit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'character_id'];
    

    public function character(){
        return $this->belongsTo(Character::class);
    }
}
