<?php

namespace App\Http\Controllers;

use App\Tipo_Secado;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TiposSecadosController extends Controller
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

      return view('tiposSecados.nuevo');

    }

    public function getListado() {

      $tiposSecados = Tipo_Secado::all();

      return view('tiposSecados.listado', array(
          'tiposSecados' => $tiposSecados
      ));

    }

    public function postCrear() {

      $tipoSecado = new Tipo_Secado();

      $tipoSecado->nombre = Input::get('nombre');

      $tipoSecado->save();

    }

    public function postActualizar() {

      $tipoSecado = Tipo_Secado::find(Input::get('id'));

      $tipoSecado->nombre = Input::get('nombre');

      $tipoSecado->save();

    }

    public function postEliminar() {

      $tipoSecado = Tipo_Secado::find(Input::get('id'));

      $tipoSecado->delete();

    }

}
