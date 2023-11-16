<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimePokemon extends Model
{
    use HasFactory;
    
    public function time() {
        
        return $this->belongsToMany('App\Models\Time');
    }

    public function pokemon() {
        
        return $this->belongsTo('App\Models\Pokemon');
    }
}