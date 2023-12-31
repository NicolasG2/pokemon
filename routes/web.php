<?php

use Illuminate\Support\Facades\Route;
use App\Facades\UserPermissions;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard')->with('titulo', "");
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/pokemon', 'PokemonController');

Route::resource('/time', 'TimeController');

Route::resource('/tipo', 'TipoController');

Route::resource('/treinador', 'TreinadorController');

Route::prefix('/site')->group(function() {
    Route::get('/pokemon', 'SiteController@getPokemons')->name('site.pokemon');
    Route::get('/time', 'SiteController@getTimes')->name('site.time');
    Route::get('/tipo', 'SiteController@getTipos')->name('site.tipo');
    Route::get('/treinador', 'SiteController@getTreinadors')->name('site.treinador');
});

Route::get('/grafico', 'GraficoController@loadDataGraphs')->name('grafico.index');

Route::get('/relatorio', 'RelatorioController@createReport')->name('relatorio.geral');