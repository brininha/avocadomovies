<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbUsuario';
    protected $primaryKey = 'idUsuario';
    public $timestamps = false;

    protected $fillable = [
        'nomeUsuario',
        'emailUsuario',
        'senhaUsuario',
        'tipoUsuario',
    ];

    protected $hidden = [
        'senhaUsuario',
    ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'idUsuario', 'idUsuario');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'idUsuario', 'idUsuario');
    }

    public function getAuthPassword()
    {
        return $this->senhaUsuario;
    }

    public function getAuthIdentifierName()
    {
        return 'emailUsuario';
    }
}
