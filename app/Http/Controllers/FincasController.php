<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Finca;
use App\Municipio;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FincasController extends Controller
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

    //controller fincas
    public function create() {
        $productores    = Productor::all();
        $departamentos  = Departamento::all();
        $municipios     = Municipio::all();
        return view('fincas.nueva', array(
            'productores'     => $productores,
            'departamentos'   => $departamentos,
            'municipios'      => $municipios
        ));
    }

    public function getFincas() {
        $fincas        = Finca::with('productor','departamento','municipio')->get();
        return view('fincas.listado', array(
                'fincas'          => $fincas
            ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Finca::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Finca::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Finca::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
