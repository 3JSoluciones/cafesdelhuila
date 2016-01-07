<?php

namespace App\Http\Controllers;

use App\Medio;
use App\Productor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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

    //controller medios
    public function create() {
        $productores = Productor::all();
        return view('medios.nuevo', array(
            'productores' => $productores
        ));
    }

    public function store(Request $request)
    {
        if ($request->ajax( )) {
            Medio::create($request->all());
            return response()->json (["mensanje" => "registrado"]);
        }

    }

}
