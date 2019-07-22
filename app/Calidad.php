<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calidad extends Model
{
    protected $fillable = [
        'orden','file_image','nombre_es','nombre_en','pdf',
    ];
}
