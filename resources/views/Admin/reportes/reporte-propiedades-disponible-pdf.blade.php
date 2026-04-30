<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte de Propiedades Disponibles</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #404656; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { color: #404656; margin-bottom: 6px; }
        .subtitle { font-size: 12px; color: #6b7280; margin: 0 0 8px 0; }
        .filters { margin: 10px 0 6px 0; font-size: 11px; color: #404656; }
        .filters span { margin-right: 12px; }
        .price { font-weight: bold; }
    </style>
</head>
<body>
    <h1>Reporte de Propiedades Disponibles</h1>
    <p class="subtitle">InmoClick - Panel Administrativo</p>
    <div class="filters">
        <span><strong>Tipo de operacion:</strong> {{ $tipoSeleccionado ?? 'Todas' }}</span>
        <span><strong>Estado:</strong> Disponible</span>
    </div>

    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Operacion</th>
                <th>Zona</th>
                <th>Ciudad</th>
                <th>Precio</th>
                <th>Agente</th>
            </tr>
        </thead>
        <tbody>
            @forelse($casas as $casa)
                <tr>
                    <td>{{ $casa->codigo ?? 'N/A' }}</td>
                    <td>{{ $casa->titulo ?? 'N/A' }}</td>
                    <td>{{ $tipos[$casa->tipo] ?? ($casa->tipo ?? 'N/A') }}</td>
                    <td>{{ $casa->zona ?? 'N/A' }}</td>
                    <td>{{ $casa->ciudad ?? 'N/A' }}</td>
                    <td class="price">${{ number_format($casa->precio ?? 0, 2) }}</td>
                    <td>{{ $casa->agente->user->name ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center; color:#6b7280; padding: 16px;">No hay propiedades disponibles para mostrar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
