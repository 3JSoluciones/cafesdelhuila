<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //model municipios
    protected $table = 'municipios';
    protected $fillable = ['nombre'];
}
