<?php

namespace App\Http\Controllers;

use App\Organizacion;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductoresController extends Controller
{
    //controller productores
    public function create() {
        $productores    = Productor::with('organizacion')->get();
        $organizaciones = Organizacion::all();
        return view('productores.nuevo', array(
            'productores'       => $productores,
            'organizaciones'    => $organizaciones
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Productor::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Productor::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Productor::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
