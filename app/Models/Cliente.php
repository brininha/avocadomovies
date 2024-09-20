<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
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

    public function getAuthPassword()
    {
        return $this->senhaCliente;
    }
}
