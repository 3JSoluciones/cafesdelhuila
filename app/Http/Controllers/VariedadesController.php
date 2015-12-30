<?php

namespace App\Http\Controllers;

use App\Acidez;
use App\Aroma;
use App\Sabor;
use App\Variedad;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VariedadesController extends Controller
{
    //controller variedades
    public function create() {
        $acidezes = Acidez::all();
        $aromas  = Aroma::all();
        $sabores  = Sabor::all();
        return view('variedades.nueva', array(
            'acidezes' => $acidezes,
            'aromas'   => $aromas,
            'sabores'  => $sabores
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Variedad::create($request->all());
            return response()->json ([
                "mensanje" => "registrado"
            ]);
        }
    }

}
