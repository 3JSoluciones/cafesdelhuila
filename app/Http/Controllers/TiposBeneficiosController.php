<?php

namespace App\Http\Controllers;

use App\Tipo_Beneficio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TiposBeneficiosController extends Controller
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

    //controller tiposBeneficios
    public function create() {
        $tiposBeneficios = \App\Tipo_Beneficio::all();
        return view('tiposBeneficios.nuevo', array(
            'tiposBeneficios' => $tiposBeneficios
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Tipo_Beneficio::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Tipo_Beneficio::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Tipo_Beneficio::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
