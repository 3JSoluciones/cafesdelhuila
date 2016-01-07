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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //controller certificacionesProductores
    public function create() {
        $certificacionesProductores = Certificacion_Productor::with('certificacion','productor')->get();
        $productores                = Productor::all();
        $certificaciones            = Certificacion::all();
        return view('certificacionesProductores.nueva', array(
            'certificacionesProductores' => $certificacionesProductores,
            'productores'                 => $productores,
            'certificaciones'             => $certificaciones
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Certificacion_Productor::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Certificacion_Productor::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Certificacion_Productor::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
