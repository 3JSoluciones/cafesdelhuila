<?php

namespace App\Http\Controllers;

use App\Acidez;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AcidezController extends Controller
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

    //controller acidez
    public function create() {
        return view('acidez.nueva');
    }

    public function getAcidez() {
        $acidez = Acidez::all();
        return view('acidez.listado', array(
            'acidez' => $acidez
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Acidez::create($request->all());
            return response()->json (["mensanje" => "registrando"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Acidez::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizando"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Acidez::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminando"]);
        }
    }

}
