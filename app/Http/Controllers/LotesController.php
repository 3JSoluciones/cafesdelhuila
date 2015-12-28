<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LotesController extends Controller
{
    //controller lotes
    public function nuevo() {
        return view('lotes.nuevo');
    }
}
