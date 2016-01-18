<?php

namespace App\Http\Controllers;

use App\Finca;
use App\Lote;
use App\Sabor;
use App\Acidez;
use App\Aroma;
use App\Tipo_Beneficio;
use App\Tipo_Secado;
use App\Variedad;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Storage;

class LotesController extends Controller
{

    /*
     * Create a new controller instance.
     *
     * @return void
     *
    public function __construct()
    {
        $this->middleware('auth');
    }*/



    public function getCrear() {

      $fincas             = Finca::where('productor_id', '=', Input::get('id'))->get();

      $variedades         = Variedad::all();
      $tiposBeneficios    = Tipo_Beneficio::all();
      $tiposSecados       = Tipo_Secado::all();
      $acidezes           = Acidez::all();
      $aromas             = Aroma::all();
      $sabores            = Sabor::all();

      return view('lotes.crear', array(
          'fincas'            => $fincas,
          'variedades'        => $variedades,
          'tiposBeneficios'   => $tiposBeneficios,
          'tiposSecados'      => $tiposSecados,
          'acidezes'          => $acidezes,
          'aromas'            => $aromas,
          'sabores'           => $sabores
      ));

    }

    public function getListado() {

      $lotes = DB::table('fincas')
          ->join('lotes', 'fincas.id', '=', 'lotes.finca_id')
          ->join('productores', 'fincas.productor_id', '=', 'productores.id')
          ->where('fincas.productor_id', '=', Input::get('idP'))
          ->select('lotes.*')
          ->get();

        return view('lotes.listado', array(
            'lotes' => $lotes
        ));

    }

    public function postCrear() {

      $AcutualizarLote = Input::get('lote_actualizar');
      $idLoteActualizar = Input::get('id_lote_actualizar');
      $idPro  = Input::get('id_lotes_perfil');


        $lote = new Lote();

        $lote->finca_id  = Input::get('finca_id');
        $lote->variedad1_id = Input::get('variedad1');
        $lote->variedad2_id = Input::get('variedad2');
        $lote->variedad3_id = Input::get('variedad3');
        $lote->acidez_id = Input::get('acidez_id');
        $lote->aroma_id  = Input::get('aroma_id');
        $lote->sabor_id  = Input::get('sabor_id');
        $lote->tipo_beneficio_id = Input::get('tipo_beneficio_id');
        $lote->tipo_secado_id    = Input::get('tipo_secado_id');
        $lote->Cantidad_arboles_variedad1 = Input::get('cantidad_aboles_variedad1');
        $lote->Cantidad_arboles_variedad2 = Input::get('cantidad_aboles_variedad2');
        $lote->Cantidad_arboles_variedad3 = Input::get('cantidad_aboles_variedad3');
        $lote->nombre  = Input::get('nombre');
        $lote->area    = Input::get('area');
        $lote->notas_variedad1    = Input::get('notas_variedad1');
        $lote->notas_variedad2    = Input::get('notas_variedad2');
        $lote->notas_variedad3    = Input::get('notas_variedad3');

        $lote->save();

        $file   = Input::file('perfil');
        if($file != null) {

          $nombre = $file->getClientOriginalName();
          $extend = $file->getClientOriginalExtension();

          $lote = Lote::find($lote->id);
          $lote->perfil = $lote->id.$lote->nombre.'.'.$extend;
          $lote->save();

          $directorio = public_path().'/medios_lotes/';
          $file->move($directorio, $lote->id.$lote->nombre.'.'.$extend);

        }

        return redirect('productoresPerfil/getPerfil/'.$idPro);

    }

    public function postEliminar() {

      $lote = Lote::find(Input::get('id'));

      $lote->delete();

      if(Input::get('perfil') != null) {
        if(Storage::exists(Input::get('perfil'))) {
            Storage::delete(Input::get('perfil'));
        }
      } else {

      }

    }

}
