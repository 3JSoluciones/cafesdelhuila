<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TiposBeneficiosController extends Controller
{
    //controller tiposBeneficios
    public function nuevo() {
        return view('tiposBeneficios.nuevo');
    }
}
