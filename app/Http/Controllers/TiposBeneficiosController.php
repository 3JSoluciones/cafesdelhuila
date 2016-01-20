<?php

namespace App\Http\Controllers;

use App\Tipo_Beneficio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TiposBeneficiosController extends Controller
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

      return view('tiposBeneficios.nuevo');

    }

    public function getListado() {

      $tiposBeneficios = Tipo_Beneficio::all();

      return view('tiposBeneficios.listado', array(
          'tiposBeneficios' => $tiposBeneficios
      ));

    }

    public function postCrear() {

      $tipoBeneficio = new Tipo_Beneficio();

      $tipoBeneficio->nombre = Input::get('nombre');

      $tipoBeneficio->save();

    }

    public function postActualizar() {

      $tipoBeneficio = Tipo_Beneficio::find(Input::get('id'));

      $tipoBeneficio->nombre = Input::get('nombre');

      $tipoBeneficio->save();

    }

    public function postEliminar() {

      $tipoBeneficio = Tipo_Beneficio::find(Input::get('id'));

      $tipoBeneficio->delete();

    }

}
