<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FincasController extends Controller
{
    //controller fincas
    public function nueva() {
        return view('fincas.nueva');
    }
}
