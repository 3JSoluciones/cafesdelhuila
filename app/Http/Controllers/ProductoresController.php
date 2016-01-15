<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Organizacion;
use App\Productor;
use Illuminate\Http\Request;

class ProductoresController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	public function show() {

		$productores = Productor::with('organizacion')->get();

		return view('productores.listado', array(
			'productores' => $productores,
		));
	}

	//controller productores
	public function create() {

		$organizaciones = Organizacion::all();
		$proceso = 1;

		return view('productores.nuevo', array(
			'organizaciones' => $organizaciones,
			'proceso' => $proceso,
		));

	}

	public function store(Request $request) {
		if ($request->ajax()) {
			Productor::create($request->all());
			return response()->json(["mensanje" => "registrado"]);
		}
	}

	public function update(Request $request, $id) {
		if ($request->ajax()) {
			Productor::find($id)->fill($request->all())->save();
			return response()->json(["mensaje" => "actualizado"]);
		}
	}

	public function destroy(Request $request, $id) {
		if ($request->ajax()) {
			Productor::find($id)->fill($request->all())->delete();
			return response()->json(["mensaje" => "eliminado"]);
		}
	}

	public function getPerfil($id) {
		$productor = Productor::with('organizacion')->where('id', '=', $id)->get();

		if ($productor->count()) {
			$productor = $productor->first();
			$organizaciones = Organizacion::all();
			$medioAgregado = 1;
			return view('productores.perfil', array(
				'organizaciones' => $organizaciones,
				'productor' => $productor,
				'medioAgregado' => $medioAgregado,
			));
		} else {
			console . log('el productor no existe :(');
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
				'productor' => $productor,
				'organizaciones' => $organizaciones,
				'proceso' => $proceso,
			));
		} else {
			echo "error";
		}
	}

}
