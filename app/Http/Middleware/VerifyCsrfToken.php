<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'combates/add',
        'pokemons/add',
        'times/add',
        'tipos/add',
        'treinadors/add',
        'professors/add',
        'timePokemons/add'
    ];
}
