<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
