<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $connection = 'mysql';
    protected $table = 'visitantes';
    protected $primaryKey = 'visitante_id';
    protected $fillable = [
        'hora',
        'fecha',
        'duracion_minutos',
        'ip',
        'navegador',
        'sistema_operativo',
        'pais',
        'ciudad'
    ];
    use HasFactory;
}
