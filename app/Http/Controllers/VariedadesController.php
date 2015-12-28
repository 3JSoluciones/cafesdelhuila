<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VariedadesController extends Controller
{
    //controller variedades
    public function nueva() {
        return view('variedades.nueva');
    }
}
