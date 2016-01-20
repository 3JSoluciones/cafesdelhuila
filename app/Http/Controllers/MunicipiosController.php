<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MunicipiosController extends Controller
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

      return view('municipios.nuevo');

    }

    public function getListado() {

      $municipios = Municipio::all();

      return view('municipios.listado', array(
          'municipios' => $municipios
      ));

    }

    public function postCrear() {

      $municipio = new Municipio();

      $municipio->nombre = Input::get('nombre');

      $municipio->save();

    }

    public function postActualizar() {

      $municipio = Municipio::find(Input::get('id'));

      $municipio->nombre = Input::get('nombre');

      $municipio->save();

    }

    public function postEliminar() {

      $municipio = Municipio::find(Input::get('id'));

      $municipio->delete();

    }

}
