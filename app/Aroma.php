<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aroma extends Model
{
    //model aromas
    protected $table = 'aromas';

    protected $fillable = ['nombre'];

    public function aroma() {
      return $this->hasMany('App\Aroma');
    }

}
