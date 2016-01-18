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
    public function __construct()
    {
        $this->middleware('auth');
    }*/

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

      $certificaciones = new Certificacion();

      $certificaciones->nombre = Input::get('nombre');

      $certificaciones->save();

    }

    public function postActualizar() {

      $certificaciones = Certificacion::find(Input::get('id'));

      $certificaciones->nombre = Input::get('nombre');

      $certificaciones->save();

    }

    public function postEliminar() {

      $certificaciones = Certificacion::find(Input::get('id'));

      $certificaciones->delete();

    }

}
