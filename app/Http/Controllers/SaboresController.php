<?php

namespace App\Http\Controllers;

use App\Sabor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SaboresController extends Controller
{
    //controller sabores
    public function create() {
        return view('sabores.nuevo');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Sabor::create($request->all());
            return response()->json ([
                "mensanje" => "registrado"
            ]);
        }
    }

}
