<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DepartamentosController extends Controller
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

    //controller departamentos
    public function create()
    {
        return view('departamentos.nuevo');
    }

    public function getDepartamentos() {
        $departamentos = \App\Departamento::all();
        return view('departamentos.listado', array(
            'departamentos' => $departamentos
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
             Departamento::create($request->all());
             return response()->json (["mensanje" => "registrado"]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            Departamento::find($id)->fill($request->all())->save();
            return response()->json (["mensanje" => "actualizado"]);
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Departamento::find($id)->fill($request->all())->delete();
            return response()->json(["mensanje" => "eliminado"]);
        }
    }

}
