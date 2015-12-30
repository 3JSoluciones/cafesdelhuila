<?php

namespace App\Http\Controllers;

use App\Organizacion;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductoresController extends Controller
{
    //controller productores
    public function create() {
        $organizaciones = Organizacion::all();
        return view('productores.nuevo', array(
            'organizaciones' => $organizaciones
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Productor::create($request->all());
            return response()->json ([
                "mensanje" => "registrado"
            ]);
        }
    }

}
