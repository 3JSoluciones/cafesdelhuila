<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //model departamento
    protected $table = 'departamentos';
    protected $fillable = ['nombre'];
}