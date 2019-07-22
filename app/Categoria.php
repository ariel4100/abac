<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $guarded = [];

    public function novedades() {
        return $this->hasMany('App\Novedad');
    }
}
