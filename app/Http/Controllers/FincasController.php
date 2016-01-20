<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Finca;
use App\Lote;
use App\Municipio;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FincasController extends Controller
{
    /*
     * Create a new controller instance.
     *
     * @return void
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCrear() {

      $productores    = Productor::all();
      $departamentos  = Departamento::all();
      $municipios     = Municipio::all();

      return view('fincas.crear', array(
          'productores'     => $productores,
          'departamentos'   => $departamentos,
          'municipios'      => $municipios
      ));

    }

    public function getListado() {

      $fincas = Finca::with('productor','departamento','municipio')
          ->where('productor_id', '=', Input::get('id'))
          ->get();

      if($fincas->count()) {

          return view('fincas.listado', array(
              'fincas' => $fincas
          ));

      } else {

          echo"
          <div class='text-center'>
            <h4><b>Sin Datos Registrados</b></h4>
          </div>";

      }
    }

    public function postCrear() {

      $finca = new Finca();

      $finca->productor_id       = Input::get('Productor_id');
      $finca->departamento_id    = Input::get('Departamento_id');
      $finca->municipio_id       = Input::get('Municipio_id');
      $finca->corregimiento      = Input::get('Corregimiento');
      $finca->vereda             = Input::get('Vereda');
      $finca->finca              = Input::get('Finca');
      $finca->latitud            = Input::get('Latitud');
      $finca->longitud           = Input::get('Longitud');
      $finca->altitud            = Input::get('altitud');
      $finca->cosecha_comienza   = Input::get('Cosecha_comienza');
      $finca->cosecha_termina    = Input::get('Cosecha_termina');
      $finca->mitaca_comienza    = Input::get('Mitaca_comienza');
      $finca->mitaca_termina     = Input::get('Mitaca_termina');

      $finca->save();

    }

    public function postActualizar() {

      $finca = Finca::find(Input::get('id'));

      $finca->productor_id       = Input::get('Productor_id');
      $finca->departamento_id    = Input::get('Departamento_id');
      $finca->municipio_id       = Input::get('Municipio_id');
      $finca->corregimiento      = Input::get('Corregimiento');
      $finca->vereda             = Input::get('Vereda');
      $finca->finca              = Input::get('Finca');
      $finca->latitud            = Input::get('Latitud');
      $finca->longitud           = Input::get('Longitud');
      $finca->altitud            = Input::get('altitud');
      $finca->cosecha_comienza   = Input::get('Cosecha_comienza');
      $finca->cosecha_termina    = Input::get('Cosecha_termina');
      $finca->mitaca_comienza    = Input::get('Mitaca_comienza');
      $finca->mitaca_termina     = Input::get('Mitaca_termina');

      $finca->save();

    }

    public function postEliminar() {

      $idFinca  = Input::get('id');
      $lote     = Lote::where('finca_id', '=', $idFinca);
      $finca    = Finca::find($idFinca);

      $finca->delete();

      if($lote->count()) {

        $lote->delete();

      }

    }

}
