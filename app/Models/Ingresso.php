<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresso extends Model
{
    use HasFactory;

    protected $table = "tbingresso";

    protected $fillable = [
        "idFilme", 
        "idCliente", 
        "statusIngresso",
    ];

    protected $primaryKey = 'idIngresso';
    public $timestamps = false;
}
