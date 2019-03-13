<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $guarded = [];

    public function scopeSeccionTipo($query, $seccion, $tipo) {
        return $query->where(['section' => $seccion, 'type' => $tipo]);
    }
}
