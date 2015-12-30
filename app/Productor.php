<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    //model productor
    protected $table = 'productores';

    //foreign keys
    public function organizacion() {
        return $this->hasOne('App\Productor','id','productor_id');
    }

    protected $fillable = ['Organizacion_id','nombre','Telefono','Email'];
}
