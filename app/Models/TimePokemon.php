<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimePokemon extends Model
{
    use HasFactory;
    
    protected $table = 'timePokemons';

    protected $fillable = ['id', 'id_pokemon', 'updated_at', 'created_at'];

    public function time() {
        
        return $this->belongsTo('App\Models\Time');
    }

    public function pokemon() {
        
        return $this->belongsTo('App\Models\Pokemon');
    }
}