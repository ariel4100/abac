<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $guarded = [];

    public function productos() {
        return $this->hasMany('App\Producto');
    }
}
