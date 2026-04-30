<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte de Ventas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #404656; font-size: 12px; }
        .header { margin-bottom: 16px; }
        .title { font-size: 20px; font-weight: bold; color: #404656; margin: 0 0 4px 0; }
        .subtitle { font-size: 12px; color: #6b7280; margin: 0; }
        .filters { margin-top: 8px; padding: 8px 10px; background: #fff6ea; border: 1px solid #f2d7b5; border-radius: 6px; }
        .filters span { display: inline-block; margin-right: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th { background-color: #404656; color: #ffffff; text-align: left; padding: 8px; font-size: 11px; }
        td { border: 1px solid #e5e7eb; padding: 8px; vertical-align: top; }
        .price { font-weight: bold; color: #404656; }
        .footer { margin-top: 12px; font-size: 10px; color: #6b7280; }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">Reporte de Ventas</h1>
        <p class="subtitle">InmoClick - Panel Administrativo</p>
        <div class="filters">
            <span><strong>Agente:</strong> {{ $agenteSeleccionado ?? 'Todos' }}</span>
            <span><strong>Desde:</strong> {{ $filtros['fecha_desde'] ?? 'Todas' }}</span>
            <span><strong>Hasta:</strong> {{ $filtros['fecha_hasta'] ?? 'Todas' }}</span>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Codigo Casa</th>
                <th>Titulo</th>
                <th>Agente</th>
                <th>Cliente</th>
                <th>Precio Venta</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}</td>
                    <td>{{ $venta->casa->codigo ?? 'N/A' }}</td>
                    <td>{{ $venta->casa->titulo ?? 'N/A' }}</td>
                    <td>{{ $venta->agente->user->name ?? 'N/A' }}</td>
                    <td>{{ $venta->cliente->nombre ?? 'N/A' }} {{ $venta->cliente->apellido ?? '' }}</td>
                    <td class="price">${{ number_format($venta->precio_venta, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:#6b7280; padding: 16px;">No hay ventas para mostrar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Generado el {{ now()->format('d/m/Y H:i') }}
    </div>
</body>
</html>
