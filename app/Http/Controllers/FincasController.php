<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Finca;
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
    public function __construct()
    {
        $this->middleware('auth');
    }*/

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

      $fincas = new Finca();

      $fincas->productor_id       = Input::get('Productor_id');
      $fincas->departamento_id    = Input::get('Departamento_id');
      $fincas->municipio_id       = Input::get('Municipio_id');
      $fincas->corregimiento      = Input::get('Corregimiento');
      $fincas->vereda             = Input::get('Vereda');
      $fincas->finca              = Input::get('Finca');
      $fincas->latitud            = Input::get('Latitud');
      $fincas->longitud           = Input::get('Longitud');
      $fincas->altitud            = Input::get('altitud');
      $fincas->cosecha_comienza   = Input::get('Cosecha_comienza');
      $fincas->cosecha_termina    = Input::get('Cosecha_termina');
      $fincas->mitaca_comienza    = Input::get('Mitaca_comienza');
      $fincas->mitaca_termina     = Input::get('Mitaca_termina');

      $fincas->save();

    }

    public function postActualizar() {

      $fincas = Finca::find(Input::get('id'));

      $fincas->productor_id       = Input::get('Productor_id');
      $fincas->departamento_id    = Input::get('Departamento_id');
      $fincas->municipio_id       = Input::get('Municipio_id');
      $fincas->corregimiento      = Input::get('Corregimiento');
      $fincas->vereda             = Input::get('Vereda');
      $fincas->finca              = Input::get('Finca');
      $fincas->latitud            = Input::get('Latitud');
      $fincas->longitud           = Input::get('Longitud');
      $fincas->altitud            = Input::get('altitud');
      $fincas->cosecha_comienza   = Input::get('Cosecha_comienza');
      $fincas->cosecha_termina    = Input::get('Cosecha_termina');
      $fincas->mitaca_comienza    = Input::get('Mitaca_comienza');
      $fincas->mitaca_termina     = Input::get('Mitaca_termina');

      $fincas->save();

    }

    public function postEliminar() {

      $fincas = Finca::find(Input::get('id'));

      $fincas->delete();

    }

}
