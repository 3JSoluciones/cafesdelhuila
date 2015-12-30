<?php

namespace App\Http\Controllers;

use App\Finca;
use App\Lote;
use App\Tipo_Beneficio;
use App\Tipo_Secado;
use App\Variedad;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LotesController extends Controller
{
    //controller lotes
    public function create() {
        $fincas             = Finca::all();
        $variedades         = Variedad::all();
        $tiposBeneficios    = Tipo_Beneficio::all();
        $tiposSecados       = Tipo_Secado::all();
        return view('lotes.nuevo', array(
            'fincas'            => $fincas,
            'variedades'        => $variedades,
            'tiposBeneficios'   => $tiposBeneficios,
            'tiposSecados'      => $tiposSecados
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Lote::create($request->all());
            return response()->json ([
                "mensanje" => "registrado"
            ]);
        }
    }

}
