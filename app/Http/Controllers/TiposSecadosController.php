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
    public function __construct()
    {
        $this->middleware('auth');
    }*/

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

      $tiposSecados = new Tipo_Secado();

      $tiposSecados->nombre = Input::get('nombre');

      $tiposSecados->save();

    }

    public function postActualizar() {

      $tiposSecados = Tipo_Secado::find(Input::get('id'));

      $tiposSecados->nombre = Input::get('nombre');

      $tiposSecados->save();

    }

    public function postEliminar() {

      $tiposSecados = Tipo_Secado::find(Input::get('id'));

      $tiposSecados->delete();

    }

}
