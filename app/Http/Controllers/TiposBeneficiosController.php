<?php

namespace App\Http\Controllers;

use App\Tipo_Beneficio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TiposBeneficiosController extends Controller
{
    //controller tiposBeneficios
    public function create() {
        return view('tiposBeneficios.nuevo');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Tipo_Beneficio::create($request->all());
            return response()->json ([
                "mensanje"=>"registrado"
            ]);
        }
    }

}
