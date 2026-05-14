<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'carro_id', 
        'nome_cliente', 
        'data_retirada', 
        'data_prevista_devolucao', 
        'status'
    ];

    // Relacionamento reverso (Um agendamento pertence a um carro)
    public function carro() {
        return $this->belongsTo(Carro::class);
    }
}