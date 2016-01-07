<?php

namespace App\Http\Controllers;

use App\Aroma;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AromasController extends Controller
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

    //controller aromas
    public function create() {
        $aromas = \App\Aroma::all();
        return view('aromas.nuevo', array(
            'aromas' => $aromas
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Aroma::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Aroma::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Aroma::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
