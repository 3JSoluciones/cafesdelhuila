<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartamentosController extends Controller
{
    //controller departamentos
    public function nuevo() {
        return view('departamentos.nuevo');
    }
}
