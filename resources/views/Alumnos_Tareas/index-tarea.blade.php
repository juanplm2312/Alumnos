<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio.</title>
</head>

<body>
    <h1>Alumnos</h1>
    
    <ul>
        <li>
            <a href="{{ route('alumnos.create') }}">Crear Alumno</a>
        </li>
    </ul>
    <table border="1" > 
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Código</th>
                <th>Fecha de Nacimiento</th>
                <th>Sexo</th>
                <th>Carrera</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($alumnos as $alumno)
        <tr>
            <td>
                {{ $alumno->id }}
            </td>
            <td>
                <a href="{{ route('alumnos.show', $alumno->id) }}">{{ $alumno->nombre }}</a>
            </td>
            <td>
                {{ $alumno->correo }}
            </td>
            <td>
                {{ $alumno->codigo }}
            </td>
            <td>
                {{ $alumno->fecha_nacimiento }}
            </td>
            <td>
                {{ $alumno->sexo }}
            </td>
            <td>
                {{ $alumno->carrera }}
            </td>
            <td>
                <a href="{{ route('alumnos.edit', $alumno->id) }}">Editar</a>
                <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn">Eliminar</button>
                 </form>
            </td>
        </tr>
        @endforeach
    
        </tbody>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>