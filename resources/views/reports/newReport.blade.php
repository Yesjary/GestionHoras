<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Reporte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap para estilos -->
</head>
<body>
    <div class="container mt-5">
        <h1>Generar Reporte</h1>
        <form method="POST" action="{{ route('reports.new') }}" >
            @csrf
            
            <div class="form-group">
                <label for="content">Periodo del Reporte:</label>
                <textarea class="form-control" name="report_content" rows="3" required>{{ old('report_content') }}</textarea>
                <small class="form-text text-muted">Indica el periodo del reporte (ej. "Septiembre 2024").</small>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Enviar reporte</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
