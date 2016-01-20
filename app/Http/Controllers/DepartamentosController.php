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
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


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

      $departamento = new Departamento();

      $departamento->nombre = Input::get('nombre');

      $departamento->save();

    }

    public function postActualizar() {

      $departamento = Departamento::find(Input::get('id'));

      $departamento->nombre = Input::get('nombre');

      $departamento->save();

    }

    public function postEliminar() {

      $departamento = Departamento::find(Input::get('id'));

      $departamento->delete();

    }

}
