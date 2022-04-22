<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    protected $table = "matches";

    protected $fillable = ['fecha', 'etapa', 'equipo_local', 'equipo_visitante'];
}
