<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    //model organizaciones
    protected $table = 'organizaciones';
    protected $fillable = ['nombre'];
}
