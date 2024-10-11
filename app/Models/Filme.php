<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = "tbfilme";
    protected $primaryKey = 'idFilme';

    protected $fillable = [
        "nomeFilme", 
        "capaFilme", 
        "descFilme", 
        "idGenero", 
        "dataLancamento",
        "duracaoFilme",
        "diretorFilme",
        "elencoFilme",
        "idIdioma",
        "faixaEtariaFilme",
        "trailerFilme",
        "dataEntradaCartaz",
        "dataSaidaCartaz",
    ];

    public $timestamps = false;
}
