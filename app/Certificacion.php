<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    //model certificaciones
    protected $table = 'certificaciones';

    protected $fillable = ['nombre'];

    //foreign keys
    public function certificacion() {
        return $this->hasOne('App\Certificacion');
    }

}
