<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TiposSecadosController extends Controller
{
    //controller tiposSecados
    public function nuevo() {
        return view('tiposSecados.nuevo');
    }
}
