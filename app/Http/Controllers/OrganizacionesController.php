<?php

namespace App\Http\Controllers;

use App\Organizacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrganizacionesController extends Controller
{
    //controller organizacion
    public function create() {
        $organizaciones = \App\Organizacion::all();
        return view('organizaciones.nueva', array(
            'organizaciones' => $organizaciones
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Organizacion::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            Organizacion::find($id)->fill($request->all())->save();
            return response()->json (["mensanje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Organizacion::find($id)->fill($request->all())->delete();
            return response()->json(["mensanje" => "eliminado"]);
        }
    }

}
