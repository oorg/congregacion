<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartas extends Model
{
    protected $fillable = ['id', 'nombre_original', 'nombre_hash', 'size', 'mime', 'extension'];
}