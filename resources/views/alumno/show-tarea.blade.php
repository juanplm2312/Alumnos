<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Alumnos.</title>
</head>
<body>
    <h1>Alumno</h1>
    <a href="{{ route('alumno.create') }}">Crear Alumno</a>
    <div>
        <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
        <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
        <p><strong>Código:</strong> {{ $alumno->codigo }}</p>
        <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
        <p><strong>Sexo:</strong> {{ $alumno->sexo }}</p>
        <p><strong>Carrera:</strong> {{ $alumno->carrera }}</p>
    </div>
    
</body>
</html> 