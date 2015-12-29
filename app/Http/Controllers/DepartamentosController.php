<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartamentosController extends Controller
{
    //controller departamentos
    public function create()
    {
        return view('departamentos.nuevo');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
                Departamento::create($request->all());
                return response()->json ([
                         "mensanje"=>"registrado"
                ]);
        }
    }
}
