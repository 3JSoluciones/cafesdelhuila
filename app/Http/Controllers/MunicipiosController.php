<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MunicipiosController extends Controller
{
    //controller municipios
    public function nuevo() {
        return view('municipios.nuevo');
    }
}
