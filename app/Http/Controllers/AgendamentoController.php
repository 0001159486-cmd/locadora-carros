<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Carro;

class AgendamentoController extends Controller
{
    // RF04 - Registrar Agendamento
    public function store(Request $request)
    {
        // Salva o agendamento no banco
        Agendamento::create([
            'carro_id' => $request->carro_id,
            'nome_cliente' => $request->nome_cliente,
            'data_retirada' => $request->data_retirada,
            'data_prevista_devolucao' => $request->data_prevista_devolucao,
            'status' => 'Ativo'
        ]);

        // Altera o status do carro para Agendado
        $carro = Carro::find($request->carro_id);
        $carro->update(['status' => 'Agendado']);

        return redirect()->route('carros.index')->with('success', 'Carro agendado com sucesso!');
    }

    // RF05 - Finalizar Agendamento
    public function finalizar($id)
    {
        // 1. Volta o status do carro para Disponível
        $carro = Carro::findOrFail($id);
        $carro->update(['status' => 'Disponível']);

        // 2. Atualiza o agendamento como Finalizado
        Agendamento::where('carro_id', $id)
                    ->where('status', 'Ativo')
                    ->update(['status' => 'Finalizado']);

        return redirect()->route('carros.index')->with('success', 'Agendamento finalizado e carro liberado!');
    }
}