<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;
    protected $table = "tbidioma";
    protected $primaryKey = "idIdioma";

    protected $fillable = [
        "nomeIdioma", 
    ];

    public $timestamps = false;
}
