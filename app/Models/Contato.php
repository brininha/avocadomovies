<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $table = "tbcontato";
    protected $primaryKey = "idContato";

    protected $fillable = [
        "nomeContato", 
        "emailContato", 
        "telefoneContato", 
        "assuntoContato", 
        "mensagemContato"
    ];

    public $timestamps = false;
}
