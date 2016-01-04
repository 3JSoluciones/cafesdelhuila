<?php

namespace App\Http\Controllers;

use App\Certificacion;
use App\Certificacion_Productor;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CertificacionesProductoresController extends Controller
{
    //controller certificacionesProductores
    public function create() {
        $productores        = Productor::all();
        $certificaciones    = Certificacion::all();
        return view('certificacionesProductores.nueva', array(
            'productores'       => $productores,
            'certificaciones'  => $certificaciones
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Certificacion_Productor::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

}
