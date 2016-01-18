<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //model municipios
    protected $table = 'municipios';
    
    protected $fillable = ['nombre'];

    public function finca() {
  		return $this->hasMany('App\Finca');
  	}

}
