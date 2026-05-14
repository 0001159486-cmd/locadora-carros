<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
   public function index()
{
    $carros = Carro::all();
    return view('carros.index', compact('carros'));
}

public function store(Request $request)
{
    // O status será 'Disponível' automaticamente pelo padrão do banco
    Carro::create($request->all());
    return redirect()->route('carros.index')->with('success', 'Carro cadastrado!');
}

public function edit($id)
{
    $carro = Carro::findOrFail($id);

    // RF03: Impedir que um carro agendado seja editado
    if ($carro->status === 'Agendado') {
        return redirect()->route('carros.index')->with('error', 'Não é possível editar um carro agendado!');
    }

    return view('carros.edit', compact('carro'));
}

public function update(Request $request, $id)
{
    $carro = Carro::findOrFail($id);
    
    // RF03: Segurança extra no back-end
    if ($carro->status === 'Agendado') {
        return redirect()->route('carros.index')->with('error', 'Ação proibida!');
    }

    $carro->update($request->all());

    return redirect()->route('carros.index')->with('success', 'Carro atualizado com sucesso!');
}

public function destroy($id)
{
    $carro = Carro::findOrFail($id);
    
    // Regra RF03: Impedir exclusão de carro agendado
    if($carro->status === 'Agendado') {
        return back()->with('error', 'Não é possível excluir um carro agendado!');
    }
    
    $carro->delete();
    return redirect()->route('carros.index');
}
}
