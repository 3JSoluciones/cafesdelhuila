<?php

namespace App\Http\Controllers;

use App\Acidez;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AcidezController extends Controller
{
    //controller acidez
    public function create() {
        $acidez = \App\Acidez::all();
        return view('acidez.nueva', array(
            'acidez' => $acidez
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Acidez::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Acidez::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Acidez::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
