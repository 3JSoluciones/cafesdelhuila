<?php

namespace App\Http\Controllers;

use App\Aroma;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AromasController extends Controller
{
    //controller aromas
    public function create() {
        return view('aromas.nuevo');
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Aroma::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }
    }

}
