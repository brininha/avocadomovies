<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'tbCinema';
    protected $primaryKey = 'idCinema';
    public $timestamps = false;

    protected $fillable = [
        'nomeCinema',
        'dataInauguracao',
        'telefoneCinema',
        'numLogradouroCinema',
        'logradouroCinema',
        'bairroCinema',
        'cidadeCinema',
        'estadoCinema',
        'cepCinema',
        'latitudeCinema',
        'longitudeCinema',
    ];
}
