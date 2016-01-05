<?php

namespace App\Http\Controllers;

use App\Sabor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SaboresController extends Controller
{
    //controller sabores
    public function create() {
        $sabores = \App\Sabor::all();
        return view('sabores.nuevo', array(
            'sabores' => $sabores
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Sabor::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Sabor::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Sabor::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
