<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductoresController extends Controller
{
    //controller productores
    public function nuevo() {
        return view('productores.nuevo');
    }
}
