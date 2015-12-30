<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Finca;
use App\Municipio;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FincasController extends Controller
{
    //controller fincas
    public function create() {
        $productores    = Productor::all();
        $departamentos  = Departamento::all();
        $municipios     = Municipio::all();
        return view('fincas.nueva', array(
            'productores'     => $productores,
            'departamentos'   => $departamentos,
            'municipios'      => $municipios
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Finca::create($request->all());
            return response()->json ([
                "mensanje" => "registrado"
            ]);
        }
    }

}
