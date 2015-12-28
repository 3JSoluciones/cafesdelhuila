<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    //model lote
    protected $table = 'lotes';

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
}
