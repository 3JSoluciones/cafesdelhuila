<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class DepartamentosController extends Controller
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
        return view('departamentos.nuevo');
    }

    public function getListado() {
      $departamentos = Departamento::all();
      return view('departamentos.listado', array(
          'departamentos' => $departamentos
      ));
    }

    public function postCrear() {

      $departamentos = new Departamento();

      $departamentos->nombre = Input::get('nombre');

      $departamentos->save();

    }

    public function postActualizar() {

      $departamentos = Departamento::find(Input::get('id'));

      $departamentos->nombre = Input::get('nombre');

      $departamentos->save();

    }

    public function postEliminar() {

      $departamentos = Departamento::find(Input::get('id'));

      $departamentos->delete();

    }

}
