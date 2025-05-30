<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtarea extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'tarea_id',
    ];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }

}
