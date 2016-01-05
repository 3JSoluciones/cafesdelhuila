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
        $tiposSecados = \App\Tipo_Secado::all();
        return view('tiposSecados.nuevo', array(
            'tiposSecados' => $tiposSecados
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Tipo_Secado::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Tipo_Secado::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Tipo_Secado::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
