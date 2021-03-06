<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    //model finca
    protected $table = 'fincas';

    protected $fillable =
        [
            'Productor_id',
            'Departamento_id',
            'Municipio_id',
            'Corregimiento',
            'Vereda',
            'Finca',
            'Longitud',
            'Latitud',
            'Altitud',
            'Cosecha_comienza',
            'Cosecha_termina',
            'Mitaca_comienza',
            'Mitaca_termina'
        ];

    //foreign keys
    public function productor() {
        return $this->hasOne('App\Productor','id','productor_id');
    }

    public function departamento() {
        return $this->hasOne('App\Departamento','id','departamento_id');
    }

    public function municipio() {
        return $this->hasOne('App\Municipio','id','municipio_id');
    }

    public function lotes() {
  		return $this->hasMany('App\Lote');
  	}

}
