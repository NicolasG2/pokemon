<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';


    public function tipo() {
        
        return $this->belongsTo('App\Models\Tipo');
    }

    public function time() {
        return $this->belongsToMany('App\Models\Time', 'timePokemons');  
    }
}