<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = "tbfilme";

    protected $fillable = [
        "nomeFilme", 
        "capaFilme", 
        "descFilme", 
        "idGenero", 
        "statusFilme"
    ];

    public $timestamps = false;
}
