<?php

namespace App\Http\Controllers;

use App\Tipo_Secado;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TiposSecadosController extends Controller
{
    //controller tiposSecados
    public function create() {
        return view('tiposSecados.nuevo');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Tipo_Secado::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

}
