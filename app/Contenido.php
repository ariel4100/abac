<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $guarded = [];

    public function scopeSeccionTipo($query, $seccion, $tipo) {
        return $query->where(['section' => $seccion, 'type' => $tipo]);
    }
    public function descargas() {
        return $this->hasMany('App\Contenido', 'para', 'title_es');
    }
}
