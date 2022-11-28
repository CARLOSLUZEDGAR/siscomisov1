<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduana extends Model
{
    protected $table = 'aduanas';
    protected $fillable = [
        'id', 'descripcion', 'observacion', 'estado'
    ];
}
