<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MunicipiosController extends Controller
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

    //controller municipios
    public function create() {
        $municipios = \App\Municipio::all();
        return view('municipios.nuevo', array(
            'municipios' => $municipios
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Municipio::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            Municipio::find($id)->fill($request->all())->save();
            return response()->json (["mensanje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Municipio::find($id)->fill($request->all())->delete();
            return response()->json(["mensanje" => "eliminado"]);
        }
    }

}
