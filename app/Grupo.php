<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function integrantes()
    {
        return $this->hasMany(Integrante::class);
    }
}
