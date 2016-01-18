<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    //model lote
    protected $table = 'lotes';

    protected $fillable =
        [
            'Id',
            'Finca_id',
            'Variedad1_id',
            'Variedad2_id',
            'Variedad3_id',
            'Acidez_id',
            'Aroma_id',
            'Sabor_id',
            'Tipo_beneficio_id',
            'Tipo_secado_id',
            'Cantidad_arboles_variedad1',
            'Cantidad_arboles_variedad2',
            'Cantidad_arboles_variedad3',
            'Nombre',
            'Area',
            'Perfil',
            'notas_variedad1',
            'notas_variedad2',
            'notas_variedad3',

        ];

    //foreign keys
    public function finca() {
        return $this->hasOne('App\Finca','id','finca_id');
    }

    public function variedad1() {
        return $this->hasOne('App\Variedad','id','variedad1_id');
    }

    public function variedad2() {
        return $this->hasOne('App\Variedad','id','variedad2_id');
    }

    public function variedad3() {
        return $this->hasOne('App\Variedad','id','variedad3_id');
    }

    public function tipo_beneficio() {
        return $this->hasOne('App\Tipo_Beneficio','id','tipo_beneficio_id');
    }

    public function tipo_secado() {
        return $this->hasOne('App\Tipo_Secado','id','tipo_secado_id');
    }

    public function acidez() {
        return $this->hasOne('App\Acidez','id','acidez_id');
    }

    public function aroma() {
        return $this->hasOne('App\Aroma','id','aroma_id');
    }

    public function sabor() {
        return $this->hasOne('App\Sabor','id','sabor_id');
    }
    

}
