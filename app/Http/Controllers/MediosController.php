<?php

namespace App\Http\Controllers;

use App\Medio;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MediosController extends Controller
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

    public function show() {
        $medios = Medio::with('productor')
            ->where('productor_id', '=', Input::get('id'))
            ->get();
        if($medios->count()) {
            return view('medios.listado', array(
                    'medios' => $medios
                ));
        } else {
            echo
            "
            <div class='text-center row col-lg-12'>
            <h4><b>Sin Datos Registrados</b></h4>
            </div>
            ";
        }
    }

    public function getCrear(){
        $productores = Productor::all();
        return view('medios.crear', array(
            'productores' => $productores
        ));
    }

    public function store(Request $request) {
        if ($request->ajax( )) {
            Medio::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Medio::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
