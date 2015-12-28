<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MediosController extends Controller
{
    //controller medios
    public function nuevo() {
        return view('medios.nuevo');
    }
}
