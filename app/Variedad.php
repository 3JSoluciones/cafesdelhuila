<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Acidez;
use App\Aroma;
use App\Sabor;

class Variedad extends Model
{
    //model variedades
    protected $table = "variedades";

    protected $fillable = ['Acidez_id','Aroma_id','Sabor_id','nombre','Variedadescol'];

    public function acidez() {
        return $this->hasOne('App\Acidez','id','acidez_id');
    }

    public function aroma() {
        return $this->hasOne('App\Aroma','id','aroma_id');
    }

    public function sabor() {
        return $this->hasOne('App\Sabor','id','sabor_id');
    }

    public function variedad1() {
  		return $this->hasMany('App\Variedad');
  	}

    public function variedad2() {
  		return $this->hasMany('App\Variedad');
  	}

    public function variedad3() {
  		return $this->hasMany('App\Variedad');
  	}

}
