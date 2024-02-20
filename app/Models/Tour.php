<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tour';

    public $timestamps = false;
    protected $primaryKey = 'id_tour';

    protected $fillable = [
        'id_tour',
        'nombre_destino',
        'foto',
        'detalle',
        'id_empresa'
    ];

}
