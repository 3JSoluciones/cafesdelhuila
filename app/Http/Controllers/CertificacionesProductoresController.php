<?php

namespace App\Http\Controllers;

use App\Certificacion;
use App\Certificacion_Productor;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

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

    public function show() {
        $certificacionesProductores = Certificacion_Productor::with('certificacion','productor')
            ->where('productor_id', '=', Input::get('id'))
            ->get();
        if($certificacionesProductores->count()) {
            return view('certificacionesProductores.listado', array(
                    'certificacionesProductores' => $certificacionesProductores)
            );
        } else {
            echo
            "
            <div class='text-center'>
            <h4><b>Sin Datos Registrados</b></h4>
            </div>
            ";
        }
    }

    //controller certificacionesProductores
    public function getCrear() {
        $productores                = Productor::all();
        $certificaciones            = Certificacion::all();
        return view('certificacionesProductores.crear', array(
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
