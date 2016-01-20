<?php

namespace App\Http\Controllers;

use App\Acidez;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AcidezController extends Controller
{

  /*
   * Create a new controller instance.
   *
   * @return void
   */

  public function __construct()
  {
      $this->middleware('auth');
  }


    public function getCrear() {
      return view('acidez.nueva');
    }

    public function getListado() {

      $acidez = Acidez::all();
      return view('acidez.listado', array(
          'acidez' => $acidez
      ));

    }

    public function postCrear() {

      $acidez = new Acidez();

      $acidez->nombre = Input::get('nombre');

      $acidez->save();

    }

    public function postActualizar() {

      $acidez = Acidez::find(Input::get('id'));

      $acidez->nombre = Input::get('nombre');

      $acidez->save();

    }

    public function postEliminar() {

      $acidez = Acidez::find(Input::get('id'));

      $acidez->delete();

    }

}
