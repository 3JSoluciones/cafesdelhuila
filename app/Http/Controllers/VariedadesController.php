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
        $variedades     = Variedad::with('acidez','aroma','sabor')->get();
        $acidezes       = Acidez::all();
        $aromas         = Aroma::all();
        $sabores        = Sabor::all();
        return view('variedades.nueva', array(
            'variedades'    => $variedades,
            'acidezes'      => $acidezes,
            'aromas'        => $aromas,
            'sabores'       => $sabores
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Variedad::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Variedad::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Variedad::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
