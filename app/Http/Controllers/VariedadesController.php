<?php

namespace App\Http\Controllers;

use App\Acidez;
use App\Aroma;
use App\Sabor;
use App\Variedad;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class VariedadesController extends Controller
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
      $acidezes       = Acidez::all();
      $aromas         = Aroma::all();
      $sabores        = Sabor::all();
      return view('variedades.nueva', array(
          'acidezes'      => $acidezes,
          'aromas'        => $aromas,
          'sabores'       => $sabores
      ));
    }

    public function getListado() {
      $variedades     = Variedad::with('acidez','aroma','sabor')->get();
      return view('variedades.listado', array(
          'variedades'    => $variedades
      ));
    }

    public function postCrear() {

      $variedades = new Variedad();

      $variedades->nombre     = Input::get('nombre');
      $variedades->acidez_id  = Input::get('acidez_id');
      $variedades->aroma_id   = Input::get('aroma_id');
      $variedades->sabor_id   = Input::get('sabor_id');

      $variedades->save();

    }

    public function postActualizar() {

      $variedades = Variedad::find(Input::get('id'));

      $variedades->nombre     = Input::get('nombre');
      $variedades->acidez_id  = Input::get('acidez_id');
      $variedades->aroma_id   = Input::get('aroma_id');
      $variedades->sabor_id   = Input::get('sabor_id');

      $variedades->save();

    }

    public function postEliminar() {

      $variedades = Variedad::find(Input::get('id'));

      $variedades->delete();

    }

}
