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
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

      $variedad = new Variedad();

      $variedad->nombre     = Input::get('nombre');
      $variedad->acidez_id  = Input::get('acidez_id');
      $variedad->aroma_id   = Input::get('aroma_id');
      $variedad->sabor_id   = Input::get('sabor_id');

      $variedad->save();

    }

    public function postActualizar() {

      $variedad = Variedad::find(Input::get('id'));

      $variedad->nombre     = Input::get('nombre');
      $variedad->acidez_id  = Input::get('acidez_id');
      $variedad->aroma_id   = Input::get('aroma_id');
      $variedad->sabor_id   = Input::get('sabor_id');

      $variedad->save();

    }

    public function postEliminar() {

      $variedad = Variedad::find(Input::get('id'));

      $variedad->delete();

    }

}
