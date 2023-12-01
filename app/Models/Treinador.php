<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treinador extends Model
{
    use HasFactory;

    protected $table = 'treinadors';


    public function time() {
        return $this->hasOne('App\Models\Treinador');
    }
} 