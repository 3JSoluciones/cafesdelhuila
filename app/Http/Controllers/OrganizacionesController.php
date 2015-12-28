<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrganizacionesController extends Controller
{
    //controller organizacion
    public function nueva() {
        return view('organizaciones.nueva');
    }
}
