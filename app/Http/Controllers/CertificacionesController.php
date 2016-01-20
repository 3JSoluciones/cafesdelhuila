<?php

namespace App\Http\Controllers;

use App\Certificacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CertificacionesController extends Controller
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

      return view('certificaciones.nueva');

    }

    public function getListado() {

      $certificaciones = Certificacion::all();

      return view('certificaciones.listado', array(
              'certificaciones' => $certificaciones)
      );

    }

    public function postCrear() {

      $certificacion = new Certificacion();

      $certificacion->nombre = Input::get('nombre');

      $certificacion->save();

    }

    public function postActualizar() {

      $certificacion = Certificacion::find(Input::get('id'));

      $certificacion->nombre = Input::get('nombre');

      $certificacion->save();

    }

    public function postEliminar() {

      $certificacion = Certificacion::find(Input::get('id'));

      $certificacion->delete();

    }

}
