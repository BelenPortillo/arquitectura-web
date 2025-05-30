<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'prioridad',
        'user_id',
    ];

    protected $casts = [
        'estado' => 'string',
    ];

    public function getEstadoAttribute($value)
    {
        return $value === 'pendiente' ? 'Pendiente' : ($value === 'en_proceso' ? 'En Proceso' : 'Finalizado');
    }

    public function setEstadoAttribute($value)
    {
        $this->attributes['estado'] = strtolower($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subtareas()
    {
        return $this->hasMany(Subtarea::class);
    }

}
