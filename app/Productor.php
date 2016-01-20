<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model {

	protected $fillable = ['Organizacion_id', 'nombre', 'Telefono', 'Email', 'foto', 'bio'];

	// Tabla
	protected $table = 'productores';

	// Organizacion
	public function organizacion() {
		return $this->hasOne('App\Organizacion', 'id', 'organizacion_id');
	}

	// Medios
	public function medios() {
		return $this->hasMany('App\Medio');
	}

	// Fincas
	public function fincas() {
		return $this->hasMany('App\Finca');
	}

	public function certificacion_productor() {
		return $this->hasMany('App\Certificacion_Productor');
	}

}
