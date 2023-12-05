<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Models\TimePokemon;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function createReport($tipo = 0) {

        $data = array();

        switch($tipo) {
            
            default:
                    $data = $this->getDataGeneral();
                    $pdf = Pdf::loadView('relatorio.geral', compact('data'));
                    return $pdf->stream('relatorio-geral.pdf');
                    break;
        }
    }

    private function getDataGeneral() {

        $time = TimePokemon::orderBy('id')->get();
        $data = array();
        $cont = 0;

        foreach ($time as $d) {
            $obj = Pokemon::find($d->pokemon1);

            if(isset($obj)) {
                $data[$cont]['pokemon1'] = $obj->nome;
            } 

            $obj = Pokemon::find($d->pokemon2);

            if(isset($obj)) {
                $data[$cont]['pokemon2'] = $obj->nome;
            } else {
                $data[$cont]['pokemon2'] = "-";
            }

            $obj = Pokemon::find($d->pokemon3);

            if(isset($obj)) {
                $data[$cont]['pokemon3'] = $obj->nome;
            } else {
                $data[$cont]['pokemon3'] = "-";
            }

            $obj = Pokemon::find($d->pokemon4);

            if(isset($obj)) {
                $data[$cont]['pokemon4'] = $obj->nome;
            } else {
                $data[$cont]['pokemon4'] = "-";
            }

            $obj = Pokemon::find($d->pokemon5);

            if(isset($obj)) {
                $data[$cont]['pokemon5'] = $obj->nome;
            } else {
                $data[$cont]['pokemon5'] = "-";
            }

            $obj = Pokemon::find($d->pokemon6);

            if(isset($obj)) {
                $data[$cont]['pokemon6'] = $obj->nome;
            } else {
                $data[$cont]['pokemon6'] = "-";
            }
            
            $cont++;
        }

        return $data;
    }
}
