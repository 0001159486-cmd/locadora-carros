<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Editar Veículo</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('carros.update', $carro->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control" value="{{ $carro->modelo }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" value="{{ $carro->marca }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Placa</label>
                        <input type="text" name="placa" class="form-control" value="{{ $carro->placa }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ano</label>
                        <input type="number" name="ano" class="form-control" value="{{ $carro->ano }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('carros.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Atualizar Dados</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>