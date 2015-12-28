<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CertificacionesController extends Controller
{
    //controller certificaciones
    public function nueva() {
        return view('certificaciones.nueva');
    }
}
