<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    
    protected $table = 'comentarios';

    public $timestamps = false;
    protected $primaryKey = 'id_comentario';

    protected $fillable = [
        'id_comentario',
        'comentarios',
        'correo',
        'id_empresa'
    ];
}
