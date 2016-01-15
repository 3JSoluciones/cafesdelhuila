<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model {

	protected $fillable = ['Organizacion_id', 'nombre', 'Telefono', 'Email'];

	// Tabla
	protected $table = 'productores';

	// Organizacion
	public function organizacion() {
		return $this->hasOne('App\Organizacion', 'id', 'organizacion_id');
	}

	// Fincas
	public function fincas() {
		return $this->hasMany('App\Finca', 'id', 'finca_id');
	}

}
