<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = "tbgenero";

    protected $fillable = [
        "nomeGenero", 
    ];

    public $timestamps = false;
}
