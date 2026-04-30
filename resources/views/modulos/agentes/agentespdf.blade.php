<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Agentes</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { color: darkblue; }
    </style>
</head>
<body>
    <h1>Agentes Inmobiliarios</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agentes as $agente)
                <tr>
                    <td>{{ $agente->nombre }} {{ $agente->apellido }}</td>
                    <td>{{ $agente->telefono }}</td>
                    <td>{{ $agente->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
