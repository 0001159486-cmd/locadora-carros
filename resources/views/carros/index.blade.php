<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Frota - Locadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand">Olá, {{ auth()->user()->nome }}</span>
        <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Sair</a>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Frota de Veículos</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">+ Novo Carro</button>
    </div>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <table class="table bg-white shadow-sm">
        <thead class="table-dark">
            <tr><th>Modelo/Marca</th><th>Placa</th><th>Status</th><th>Ações</th></tr>
        </thead>
        <tbody>
            @foreach($carros as $c)
            <tr>
                <td>{{ $c->modelo }} ({{ $c->marca }})</td>
                <td>{{ $c->placa }}</td>
                <td><span class="badge {{ $c->status == 'Disponível' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $c->status }}</span></td>
                <td>
                    @if($c->status == 'Disponível')
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#agendar{{$c->id}}">Agendar</button>
                        <a href="{{ route('carros.edit', $c->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        <form action="{{ route('carros.destroy', $c->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>

                        <div class="modal fade" id="agendar{{$c->id}}" tabindex="-1">
                            <div class="modal-dialog">
                                <form action="{{ route('agendamentos.store') }}" method="POST" class="modal-content">
                                    @csrf <input type="hidden" name="carro_id" value="{{ $c->id }}">
                                    <div class="modal-header"><h5>Agendar {{ $c->modelo }}</h5></div>
                                    <div class="modal-body text-start">
                                        <input type="text" name="nome_cliente" placeholder="Cliente" class="form-control mb-2" required>
                                        <label>Retirada</label><input type="date" name="data_retirada" class="form-control mb-2" required>
                                        <label>Devolução</label><input type="date" name="data_prevista_devolucao" class="form-control mb-2" required>
                                    </div>
                                    <div class="modal-footer"><button type="submit" class="btn btn-primary">Confirmar</button></div>
                                </form>
                            </div>
                        </div>
                    @else
                        <form action="{{ route('agendamentos.finalizar', $c->id) }}" method="POST">
                            @csrf <button type="submit" class="btn btn-dark btn-sm">Finalizar Agendamento</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalNovo" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('carros.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Novo Carro</h5></div>
            <div class="modal-body">
                <input type="text" name="modelo" placeholder="Modelo" class="form-control mb-2" required>
                <input type="text" name="marca" placeholder="Marca" class="form-control mb-2" required>
                <input type="text" name="placa" placeholder="Placa" class="form-control mb-2" required>
                <input type="number" name="ano" placeholder="Ano" class="form-control mb-2" required>
            </div>
            <div class="modal-footer"><button type="submit" class="btn btn-primary">Salvar</button></div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>