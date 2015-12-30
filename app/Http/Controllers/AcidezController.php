<?php

namespace App\Http\Controllers;

use App\Acidez;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AcidezController extends Controller
{
    //controller acidez
    public function create() {
        return view('acidez.nueva');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Acidez::create($request->all());
            return response()->json ([
                "mensanje" => "registrado"
            ]);
        }
    }

}
