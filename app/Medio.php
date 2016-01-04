<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    //model medio
    protected $table = 'medios';

    //foreign keys
    public function productor() {
        return $this->hasOne('App\Productor','id','productor_id');
    }
    protected $fillable = ['Productor_id','nombre'];
}
