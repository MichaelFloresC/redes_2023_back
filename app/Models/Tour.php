<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tour';

    protected $fillable = [
        'id_tour',
        'nombre_destino',
        'foto',
        'detalle',
        'id_empresa'
    ];

}
