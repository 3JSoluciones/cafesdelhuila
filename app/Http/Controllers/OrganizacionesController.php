<?php

namespace App\Http\Controllers;

use App\Organizacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrganizacionesController extends Controller
{
    //controller organizacion
    public function create() {
        return view('organizaciones.nueva');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Organizacion::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

}
