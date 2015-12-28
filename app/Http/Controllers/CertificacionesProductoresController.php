<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CertificacionesProductoresController extends Controller
{
    //controller certificacionesProductores
    public function nueva() {
        return view('certificacionesProductores.nueva');
    }
}
