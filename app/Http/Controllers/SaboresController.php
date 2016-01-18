<?php

namespace App\Http\Controllers;

use App\Sabor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SaboresController extends Controller
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
      return view('sabores.nuevo');
    }

    public function getListado() {
      $sabores = Sabor::all();
      return view('sabores.listado', array(
          'sabores' => $sabores
      ));
    }

    public function postCrear() {

      $sabores = new Sabor();

      $sabores->nombre = Input::get('nombre');

      $sabores->save();

    }

    public function postActualizar() {

      $sabores = Sabor::find(Input::get('id'));

      $sabores->nombre = Input::get('nombre');

      $sabores->save();

    }

    public function postEliminar() {

      $sabores = Sabor::find(Input::get('id'));

      $sabores->delete();

    }

}
