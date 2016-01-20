<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //model departamento
    protected $table = 'contactos';

    protected $fillable = ['id','productor_id','nombre','correo','telefono','pais','mensaje'];

    public function contacto() {
      return $this->hasMany('App\Contacto');
    }

}
