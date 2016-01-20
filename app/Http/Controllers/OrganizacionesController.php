<?php

namespace App\Http\Controllers;

use App\Organizacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrganizacionesController extends Controller
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

      return view('organizaciones.nueva');

    }

    public function getListado() {

      $organizaciones = Organizacion::all();

      return view('organizaciones.listado', array(
          'organizaciones' => $organizaciones
      ));

    }

    public function postCrear() {

      $organizacion = new Organizacion();

      $organizacion->nombre = Input::get('nombre');

      $organizacion->save();

    }

    public function postActualizar() {

      $organizacion = Organizacion::find(Input::get('id'));

      $organizacion->nombre = Input::get('nombre');

      $organizacion->save();

    }

    public function postEliminar() {

      $organizacion = Organizacion::find(Input::get('id'));

      $organizacion->delete();

    }

}
