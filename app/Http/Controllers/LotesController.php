<?php

namespace App\Http\Controllers;

use App\Finca;
use App\Lote;
use App\Tipo_Beneficio;
use App\Tipo_Secado;
use App\Variedad;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LotesController extends Controller
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

       $lotes = Lote::with('finca', 'variedad1', 'variedad2', 'variedad3', 'tipo_beneficio', 'tipo_secado')
            ->where('finca_id', '=', Input::get('id'))
            ->get();

        if($lotes->count()) {
            return view('lotes.listado', array(
                'lotes'  => $lotes
            ));
        } else {
            echo
            "
            <div class='text-center'>
            <h4><b>Sin Datos Registrados</b></h4>
            </div>
            ";
        }

    }


    //controller lotes
    public function create() {
        $fincas             = Finca::all();
        $variedades         = Variedad::all();
        $tiposBeneficios    = Tipo_Beneficio::all();
        $tiposSecados       = Tipo_Secado::all();
        $acidezes           = \App\Acidez::all();
        $aromas             = \App\Aroma::all();
        $sabores            = \App\Sabor::all();
        return view('lotes.nuevo', array(
            'fincas'            => $fincas,
            'variedades'        => $variedades,
            'tiposBeneficios'   => $tiposBeneficios,
            'tiposSecados'      => $tiposSecados,
            'acidezes'      => $acidezes,
            'aromas'        => $aromas,
            'sabores'       => $sabores
        ));
    }

    public function getLotes() {
        $lotes = Lote::with(
            'finca',
            'variedad1',
            'variedad2',
            'variedad3',
            'tipo_beneficio',
            'tipo_secado'
        )->get();
        return view('lotes.listado', array(
                'lotes'  => $lotes
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Lote::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id) {
        if($request->ajax()) {
            Lote::find($id)->fill($request->all())->save();
            return response()->json(["mensaje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Lote::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
