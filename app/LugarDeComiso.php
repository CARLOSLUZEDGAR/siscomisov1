<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LugarDeComiso extends Model
{
    protected $table = 'lugar_decomisos';
    protected $fillable = [
        'id', 'id_aduana', 'descripcion', 'observacion', 'estado'
    ];
}
