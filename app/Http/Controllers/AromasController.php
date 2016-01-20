<?php

namespace App\Http\Controllers;

use App\Aroma;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AromasController extends Controller
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

      return view('aromas.nuevo');

    }

    public function getListado() {

      $aromas = Aroma::all();

      return view('aromas.listado', array(
              'aromas' => $aromas)
      );

    }

    public function postCrear() {

      $aroma = new Aroma();

      $aroma->nombre = Input::get('nombre');

      $aroma->save();

    }

    public function postActualizar() {

      $aroma = Aroma::find(Input::get('id'));

      $aroma->nombre = Input::get('nombre');

      $aroma->save();

    }

    public function postEliminar() {

      $aroma = Aroma::find(Input::get('id'));

      $aroma->delete();

    }
}
