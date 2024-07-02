<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "tbCliente";

    protected $fillable = [
        "nomeCliente", 
        "emailCliente", 
        "telefoneCliente", 
        "senhaCliente"
    ];

    public $timestamps = false;
}
