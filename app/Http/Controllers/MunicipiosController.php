<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MunicipiosController extends Controller
{
    //controller municipios
    public function create() {
        return view('municipios.nuevo');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Municipio::create($request->all());
            return response()->json ([
                "mensanje"=>"registrado"
            ]);
        }
    }

}
