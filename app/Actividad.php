<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $fillable = ['id', 'asignado_id', 'asignado_type', 'actividad', 'descripcion'];

    public function asignado()
    {
        return $this->morphTo();
    }

    public function scopeCheck($query, $id, $type)
    {
        return $query->where('asignado_id', $id)->where("asignado_type", $type);
    }
}
