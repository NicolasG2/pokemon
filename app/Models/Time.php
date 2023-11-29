<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $table = 'times';

    public function treinador() {
        
        return $this->belongsTo('App\Models\Treinador');
    }

    public function pokemon() {
        return $this->belongsToMany('App\Models\Pokemon', 'timePokemons');  
    }
}