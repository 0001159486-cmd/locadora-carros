<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Carro;
use App\Models\Agendamento;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Desativa chaves estrangeiras para limpar as tabelas sem erros
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Carro::truncate();
        Agendamento::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // --- RF01: Usuários Iniciais ---
        User::create([
            'nome' => 'Administrador',
            'login' => 'admin',
            'password' => '123' // Se estiver usando Auth padrão, lembre-se do tratamento da senha no Controller
        ]);

        User::create([
            'nome' => 'Atendente',
            'login' => 'atendente',
            'password' => 'qwer'
        ]);

        // --- RF02 e Carga Inicial: Carros ---
        $carro1 = Carro::create(['modelo' => 'Onix LT', 'marca' => 'Chevrolet', 'placa' => 'ABC1D23', 'ano' => 2022, 'status' => 'Disponível']);
        $carro2 = Carro::create(['modelo' => 'HB20 Comfort', 'marca' => 'Hyundai', 'placa' => 'DEF4E56', 'ano' => 2021, 'status' => 'Agendado']);
        $carro3 = Carro::create(['modelo' => 'Renegade Sport', 'marca' => 'Jeep', 'placa' => 'GHI7F89', 'ano' => 2023, 'status' => 'Disponível']);
        $carro4 = Carro::create(['modelo' => 'Mobi Like', 'marca' => 'Fiat', 'placa' => 'JKL2G34', 'ano' => 2020, 'status' => 'Agendado']);
        $carro5 = Carro::create(['modelo' => 'Corolla XEi', 'marca' => 'Toyota', 'placa' => 'MNO9H87', 'ano' => 2022, 'status' => 'Disponível']);

        // --- Carga Inicial: Agendamentos Ativos ---
        // Conforme o enunciado, carros que iniciam como "Agendado" devem ter registro no banco
        Agendamento::create([
            'carro_id' => $carro2->id,
            'nome_cliente' => 'Cliente Inicial HB20',
            'data_retirada' => now()->format('Y-m-d'),
            'data_prevista_devolucao' => now()->addDays(5)->format('Y-m-d'),
            'status' => 'Ativo'
        ]);

        Agendamento::create([
            'carro_id' => $carro4->id,
            'nome_cliente' => 'Cliente Inicial Mobi',
            'data_retirada' => now()->format('Y-m-d'),
            'data_prevista_devolucao' => now()->addDays(3)->format('Y-m-d'),
            'status' => 'Ativo'
        ]);
    }
}