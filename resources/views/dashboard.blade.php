<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel de Control</title>

    <!-- Estilos personalizados -->
    <style>
        .active a {
            color: red;
            text-decoration: none;
        }
    </style>

    <!-- Puedes agregar enlaces a CSS o frameworks aquí -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>

    <!-- Contenido principal usando Blade Components -->
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            @role('estudiante')
            <p>Este contenido lo va a ver el estudiante</p>
            <a href="{{ route('reports.create')}}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                Generar Reporte
            </a><br><br>
            <a href="{{ route('reports.viewReportStudent')}}" class="text-blue-500 hover:text-green-500">
                Ver estado de tu reportes
            </a><br>
            @endrole

            @role('jefe')
            <p>Este contenido lo va a ver el jefe</p>
            <a href="{{ route('reports.viewReports')}}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Lista de reportes
            </a>
            @endrole
        </div>
    </x-app-layout>

</body>
</html>

