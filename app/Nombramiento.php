<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nombramiento extends Model
{
    public function integrantes()
    {
        return $this->belongsToMany(Integrante::class)
            ->withPivot('comentario', 'edad');
    }
}
