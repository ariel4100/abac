<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{
    protected $fillable = [
        'partida','materia','articulo','descripcion'
    ];
}
