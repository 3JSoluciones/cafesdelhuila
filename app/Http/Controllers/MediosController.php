<?php

namespace App\Http\Controllers;

use App\Medio;
use App\Organizacion;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MediosController extends Controller
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

      return view('medios.crear');

    }

    public function getListado() {

      $medios = Medio::with('productor')
          ->where('productor_id', '=', Input::get('id'))
          ->get();

      if($medios->count()) {

          return view('medios.listado', array(
                  'medios' => $medios
          ));

      } else {
          echo"
          <div class='text-center row col-lg-12'>
            <h4><b>Sin Datos Registrados</b></h4>
          </div>";
      }

    }

    public function postCrear() {

      $file    = Input::file('medio');
      $idPro   = Input::get('id_productor_Medios');
      $nombre  = $file->getClientOriginalName();
      $extend  = $file->getClientOriginalExtension();
      $tamanio = $file->getClientSize();
      $img     = str_random(3).$nombre;

      $medio = new Medio();
      $medio->productor_id    = $idPro;
      $medio->nombre = $img;
      $medio->tipo   = $extend;

      $medio->save();

      $directorio = public_path().'/medios/';
      $file->move($directorio, $img);

      return redirect('productoresPerfil/getPerfil/'.$idPro);

    }

    public function postEliminar() {

        $id     = Input::get('id');
        $medio  = Input::get('medio');

        if(Storage::exists($medio)) {
            Storage::delete($medio);
        }

        Medio::find(Input::get('id'))->fill(Input::all())->delete();
        return response()->json(["mensaje" => "eliminado"]);

    }

}
