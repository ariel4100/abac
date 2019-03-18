<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    protected $fillable = [
        'nombre_es', 'nombre_en', 'orden', 'file','file_image','distribuidor'
    ];
}
