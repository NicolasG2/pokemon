<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $table = 'times';

    public function user() {
        
        return $this->belongsTo('App\Models\User');
    }

    public function pokemon() {
        return $this->belongsToMany('App\Models\Pokemon', 'timePokemons');  
    }
}