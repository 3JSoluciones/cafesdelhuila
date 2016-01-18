<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //model departamento
    protected $table = 'departamentos';
    
    protected $fillable = ['nombre'];

    public function finca() {
      return $this->hasMany('App\Finca');
    }

}
