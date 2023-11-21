<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    public function tipo() {
        
        return $this->belongsTo('App\Models\Tipo');
    }

    public function timePokemon() {
        return $this->belongsToMany('App\Models\TimePokemon');  
    }
}