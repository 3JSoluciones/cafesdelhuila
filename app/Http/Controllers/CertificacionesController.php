<?php

namespace App\Http\Controllers;

use App\Certificacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CertificacionesController extends Controller
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

    //controller certificaciones
    public function create() {
        $certificaciones = \App\Certificacion::all();
        return view('certificaciones.nueva', array(
            'certificaciones' => $certificaciones
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Certificacion::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            Certificacion::find($id)->fill($request->all())->save();
            return response()->json (["mensanje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Certificacion::find($id)->fill($request->all())->delete();
            return response()->json(["mensanje" => "eliminado"]);
        }
    }

}
