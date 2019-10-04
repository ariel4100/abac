<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{
//    protected $primarykey='id';

    public $timestamps = false;

    protected $fillable = [
        'partida','materia','articulo','descripcion'
    ];
}
