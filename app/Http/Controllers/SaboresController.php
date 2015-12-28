<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SaboresController extends Controller
{
    //controller sabores
    public function nuevo() {
        return view('sabores.nuevo');
    }
}
