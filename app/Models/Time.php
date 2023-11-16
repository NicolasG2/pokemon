<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    public function treinador() {
        
        return $this->belongsTo('App\Models\Treinador');
    }

    public function timePokemon() {
        return $this->belongsTo('App\Models\TimePokemon');  
    }
}