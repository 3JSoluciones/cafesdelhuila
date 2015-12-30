<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Secado extends Model
{
    //model tipo_secado
    protected $table = 'tipos_secados';
    protected $fillable = ['nombre'];
}
