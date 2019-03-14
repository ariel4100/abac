<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class csv extends Model
{
    protected $fillable = [
        'partida','materia','articulo','descripcion'
    ];
}
