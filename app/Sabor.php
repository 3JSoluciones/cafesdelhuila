<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sabor extends Model
{
    //model sabores
    protected $table = 'sabores';
    protected $fillable = ['nombre'];
}
