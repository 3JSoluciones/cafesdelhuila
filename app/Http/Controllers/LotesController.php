<?php

namespace App\Http\Controllers;

use App\Finca;
use App\Lote;
use App\Tipo_Beneficio;
use App\Tipo_Secado;
use App\Variedad;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LotesController extends Controller
{
    //controller lotes
    public function create() {
        $lotes              = Lote::with(
            'finca',
            'variedad1',
            'variedad2',
            'variedad3',
            'tipo_beneficio',
            'tipo_secado'
            )->get();
        $fincas             = Finca::all();
        $variedades         = Variedad::all();
        $tiposBeneficios    = Tipo_Beneficio::all();
        $tiposSecados       = Tipo_Secado::all();
        return view('lotes.nuevo', array(
            'lotes'             => $lotes,
            'fincas'            => $fincas,
            'variedades'        => $variedades,
            'tiposBeneficios'   => $tiposBeneficios,
            'tiposSecados'      => $tiposSecados
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Lote::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Lote::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Lote::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
