<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'tbAdmin';
    protected $primaryKey = 'idAdmin';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}
