<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Beneficio extends Model
{
    //model tipos_beneficios
    protected $table = 'tipos_beneficios';

    protected $fillable = ['nombre'];

    public function tipo_beneficio() {
      return $this->hasMany('App\Tipo_Beneficio');
    }

}
