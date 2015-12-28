<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AcidezController extends Controller
{
    //controller acidez
    public function nueva() {
        return view('acidez.nueva');
    }
}
