<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acidez extends Model
{
    //model acidez
    protected $table = 'acidez';

    protected $fillable = ['nombre'];

    public function acidez() {
      return $this->hasMany('App\Acidez');
    }

}
