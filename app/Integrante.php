<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Integrante extends Model
{

    protected $fillable = ['id', 'nombre', 'edad', 'telefono', 'grupo_id'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function getCreatedAtAttribute($value)
    {
        //dd($value);
        return Carbon::parse($value)->diffForHumans();
        //return $value->diffForHumans();
    }
    public function setTelefonoAttribute($value)
    {
        $value = str_replace(' ', '-', $value);
        $this->attributes['telefono'] = $value;
        //$this->attributes['telefono'] = strtolower($value);
    }
    public function actividad()
    {
        return $this->morphMany(Actividad::class, 'asignado');
    }
    public function nombramiento()
    {
        return $this->belongsToMany(Nombramiento::class)
            ->withPivot('comentario', 'edad');
    }
}
