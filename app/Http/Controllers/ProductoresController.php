<?php

namespace App\Http\Controllers;

use App\Certificacion;
use App\Certificacion_Productor;
use App\Http\Controllers\Controller;
use App\Medio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\Organizacion;
use App\Productor;
use App\Finca;
use App\Lote;

class ProductoresController extends Controller {

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

		$organizaciones = Organizacion::all();
		$proceso = 1;

		return view('productores.nuevo', array(
			'organizaciones' => $organizaciones,
			'proceso' => $proceso,
		));

	}

	public function getListado() {

		$productores = Productor::with('organizacion')->get();

		return view('productores.listado', array(
			'productores' => $productores,
		));

	}

	public function postCrear() {

		$productor = new Productor();

		$productor->organizacion_id = Input::get('organizacion_id');
		$productor->nombre 			= Input::get('nombre');
		$productor->telefono 		= Input::get('telefono');
		$productor->email 			= Input::get('email');
		$productor->foto 			= 'no_foto.png';
		$productor->bio 			= Input::get('bio');

		$productor->save();

	}

	public function postActualizar() {

		$productor = Productor::find(Input::get('id'));

		$productor->organizacion_id 		= Input::get('organizacion_id');
		$productor->nombre 					= Input::get('nombre');
		$productor->telefono 				= Input::get('telefono');
		$productor->email 					= Input::get('email');
		$productor->bio 					= Input::get('bio');

		$productor->save();

	}

	public function postEliminar() {

		$medio = Medio::where('productor_id', '=', Input::get('id'));
		if($medio->count()) {
			$medio->delete();
		}

		$certificacion = Certificacion_Productor::where('productor_id', '=', Input::get('id'));
		if($certificacion->count()) {
			$certificacion->delete();
		}

		$finca = Finca::where('productor_id', '=', Input::get('id'));
		if($finca->count()) {
			$finca = $finca->first();
			$lote = Lote::where('finca_id', '=', $finca->id);
			$lote->delete();
			$finca->delete();
		}

		$productor = Productor::where('id', '=', Input::get('id'));
		$productor->delete();

	}

	public function getPerfil($id) {

		$productor = Productor::with('organizacion')->where('id', '=', $id)->get();

		if ($productor->count()) {

			$productor = $productor->first();
			$organizaciones = Organizacion::all();
			$medioAgregado = 1;

			return view('productores.perfil', array(
				'organizaciones' 	=> $organizaciones,
				'productor' 			=> $productor,
				'medioAgregado'	  => $medioAgregado,
			));

		} else {
			return view('errors.503');
		}

	}

	public function getActualizar($id) {

		$productor = Productor::with('organizacion')
			->where('id', '=', $id)
			->get();

		$organizaciones = Organizacion::all();
		$proceso = 2;

		if ($productor->count()) {

			$productor = $productor->first();
			return view('productores.nuevo', array(
				'productor' 			=> $productor,
				'organizaciones' 		=> $organizaciones,
				'proceso' 				=> $proceso,
			));

		} else {
			echo "error al intentar actualizar el productor";
		}

	}

	public function postSubirImagen() {

		$file   = Input::file('img');
		$idPro  = Input::get('idPro');
		$nombre = $file->getClientOriginalName();
		$extend = $file->getClientOriginalExtension();

		$productor = Productor::find($idPro);

		$productor->foto    = $productor->id.'.'.$extend;
		$productor->save();

		$directorio = public_path().'/perfiles/';
		$file->move($directorio, $productor->id.'.'.$extend);

		return redirect('productoresPerfil/getPerfil/'.$idPro);

	}

	public function getPerfilImagen($archivo) {

		$public_path = public_path();
		$url = $public_path.'/perfiles/'.$archivo;
		//return response()->download($url);
		return "<div><img src='/perfiles/$archivo'></div>";

	}


}
