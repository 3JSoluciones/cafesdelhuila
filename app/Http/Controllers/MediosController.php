<?php

namespace App\Http\Controllers;

use App\Medio;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MediosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show() {
        $medios = Medio::with('productor')
            ->where('productor_id', '=', Input::get('id'))
            ->get();
        if($medios->count()) {
            return view('medios.listado', array(
                    'medios' => $medios
                ));
        } else {
            echo
            "
            <div class='text-center row col-lg-12'>
            <h4><b>Sin Datos Registrados</b></h4>
            </div>
            ";
        }
    }

    public function getCrear(){
        $productores = Productor::all();
        return view('medios.crear', array(
            'productores' => $productores
        ));
    }

    public function save(Request $request)
    {
        $file   = $request->file('file');
        $idPro  = Input::get('id_productor_Medios');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));

        $medio = Medio::where('nombre', '=', $nombre)->where('productor_id', '=', $idPro)->get();
        if($medio->count()) {
            $medio = $medio->first();
            $medio = Medio::find($medio->id);
            $medio->productor_id    = $idPro;
            $medio->nombre          = $nombre;
            $medio->save();
        } else {
            $medio = new Medio();
            $medio->productor_id    = $idPro;
            $medio->nombre          = $nombre;
            $medio->save();
        }

        return redirect(url('productores/perfil/'.$idPro));
    }

    public function destroy(Request $request, $id) {
        if($request->ajax()) {
            Medio::find($id)->fill($request->all())->delete();
            return response()->json(["mensaje" => "eliminado"]);
        }
    }

}
