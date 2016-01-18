<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Organizacion;
use App\Productor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ProductoresController extends Controller {

	/*
	 * Create a new controller instance.
	 *
	 * @return void
	 *
	public function __construct() {
		$this->middleware('auth');
	}*/

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

		$productores = new Productor();

		$productores->organizacion_id = Input::get('organizacion_id');
		$productores->nombre 					= Input::get('nombre');
		$productores->telefono 				= Input::get('telefono');
		$productores->email 					= Input::get('email');
		$productores->foto 						= 'naruto.png';

		$productores->save();

	}

	public function postActualizar() {

		$productor = Productor::find(Input::get('id'));

		$productor->organizacion_id = Input::get('organizacion_id');
		$productor->nombre 					= Input::get('nombre');
		$productor->telefono 				= Input::get('telefono');
		$productor->email 					= Input::get('email');

		$productor->save();

	}

	public function postEliminar() {

		$productores = Productor::find(Input::get('id'));

		$productores->delete();

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
			echo "el productor no existe :";
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
				'organizaciones' 	=> $organizaciones,
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


}
