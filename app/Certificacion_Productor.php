<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificacion_Productor extends Model
{
    //model certificacion_productor
    protected $table = 'certificaciones_productores';

    protected $fillable = ['Productor_id','Certificacion_id'];

    //foreign keys
    public function certificacion() {
        return $this->hasOne('App\Certificacion','id','certificacion_id');
    }
    
    public function productor() {
        return $this->hasOne('App\Productor','id','productor_id');
    }

}
