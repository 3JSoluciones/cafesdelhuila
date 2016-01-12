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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //controller variedades
    public function create() {
        $acidezes       = Acidez::all();
        $aromas         = Aroma::all();
        $sabores        = Sabor::all();
        return view('variedades.nueva', array(
            'acidezes'      => $acidezes,
            'aromas'        => $aromas,
            'sabores'       => $sabores
        ));
    }

    public function getVariedades() {
        $variedades     = Variedad::with('acidez','aroma','sabor')->get();
        return view('variedades.listado', array(
            'variedades'    => $variedades
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
