<?php

namespace App\Http\Controllers;

use App\Certificacion;
use App\Certificacion_Productor;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CertificacionesProductoresController extends Controller
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

      $productores                = Productor::all();
      $certificaciones            = Certificacion::all();

      return view('certificacionesProductores.crear', array(
          'productores'                 => $productores,
          'certificaciones'             => $certificaciones
      ));

    }

    public function getListado() {

      $certificacionesProductores = Certificacion_Productor::with('certificacion','productor')
          ->where('productor_id', '=', Input::get('id'))
          ->get();

      if($certificacionesProductores->count()) {

          return view('certificacionesProductores.listado', array(
                  'certificacionesProductores' => $certificacionesProductores
                ));

      } else {
          echo"
          <div class='text-center'>
            <h4><b>Sin Datos Registrados</b></h4>
          </div>";
      }

    }

    public function postCrear() {

      $certificacionProductor = new Certificacion_Productor();

      $certificacionProductor->productor_id     = Input::get('Productor_id');
      $certificacionProductor->certificacion_id = Input::get('Certificacion_id');

      $certificacionProductor->save();

    }

    public function postActualizar() {

      $certificacionProductor = Certificacion_Productor::find(Input::get('id'));

      $certificacionProductor->productor_id     = Input::get('Productor_id');
      $certificacionProductor->certificacion_id = Input::get('Certificacion_id');

      $certificacionProductor->save();

    }

    public function postEliminar() {

      $certificacionProductor = Certificacion_Productor::find(Input::get('id'));

      $certificacionProductor->delete();

    }

}
