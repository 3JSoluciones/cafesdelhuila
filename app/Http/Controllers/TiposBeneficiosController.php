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
    public function __construct()
    {
        $this->middleware('auth');
    }
*/

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

      $tiposBeneficios = new Tipo_Beneficio();

      $tiposBeneficios->nombre = Input::get('nombre');

      $tiposBeneficios->save();

    }

    public function postActualizar() {

      $tiposBeneficios = Tipo_Beneficio::find(Input::get('id'));

      $tiposBeneficios->nombre = Input::get('nombre');

      $tiposBeneficios->save();

    }

    public function postEliminar() {

      $tiposBeneficios = Tipo_Beneficio::find(Input::get('id'));

      $tiposBeneficios->delete();

    }

}
