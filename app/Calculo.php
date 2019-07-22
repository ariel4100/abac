<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculo extends Model
{
    protected $fillable = [
        'peso','valor','tipo','orden','peso_en'
    ];
}
