<?php

namespace App\Http\Controllers;

use App\Certificacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CertificacionesController extends Controller
{
    //controller certificaciones
    public function create() {
        return view('certificaciones.nueva');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Certificacion::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

}
