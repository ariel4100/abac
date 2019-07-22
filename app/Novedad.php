<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $guarded = [];

    protected $table = 'novedades';

    public function categoria() {
        return $this->belongsTo('App\Categoria');
    }
}
