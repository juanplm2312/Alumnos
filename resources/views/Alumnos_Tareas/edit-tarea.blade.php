<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>

    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous"
    >
</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Gestión de Alumnos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('alumnos.index') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('alumnos.create') }}">Crear Alumno</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Carreras</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="container">
        <h1 class="mb-4 text-center">Editar Alumno</h1>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre" 
                            value="{{ $alumno->nombre }}" 
                            class="form-control" 
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="correo" class="form-label">Correo</label>
                        <input 
                            type="email" 
                            id="correo" 
                            name="correo" 
                            value="{{ $alumno->correo }}" 
                            class="form-control" 
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="codigo" class="form-label">Código</label>
                        <input 
                            type="text" 
                            id="codigo" 
                            name="codigo" 
                            value="{{ $alumno->codigo }}" 
                            class="form-control"
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input 
                            type="date" 
                            id="fecha_nacimiento" 
                            name="fecha_nacimiento" 
                            value="{{ $alumno->fecha_nacimiento }}" 
                            class="form-control" 
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select id="sexo" name="sexo" class="form-select" required>
                            <option value="Masculino" {{ $alumno->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ $alumno->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="Otro" {{ $alumno->sexo == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="carrera" class="form-label">Carrera</label>
                        <select id="carrera" name="carrera" class="form-select" required>
                            <option value="Ingeniería en Sistemas" {{ $alumno->carrera == 'Ingeniería en Sistemas' ? 'selected' : '' }}>Ingeniería en Sistemas</option>
                            <option value="Ingeniería Industrial" {{ $alumno->carrera == 'Ingeniería Industrial' ? 'selected' : '' }}>Ingeniería Industrial</option>
                            <option value="Ingeniería Civil" {{ $alumno->carrera == 'Ingeniería Civil' ? 'selected' : '' }}>Ingeniería Civil</option>
                            <option value="Arquitectura" {{ $alumno->carrera == 'Arquitectura' ? 'selected' : '' }}>Arquitectura</option>
                            <option value="Medicina" {{ $alumno->carrera == 'Medicina' ? 'selected' : '' }}>Medicina</option>
                            <option value="Derecho" {{ $alumno->carrera == 'Derecho' ? 'selected' : '' }}>Derecho</option>
                            <option value="Administración de Empresas" {{ $alumno->carrera == 'Administración de Empresas' ? 'selected' : '' }}>Administración de Empresas</option>
                            <option value="Contabilidad" {{ $alumno->carrera == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
                            <option value="Psicología" {{ $alumno->carrera == 'Psicología' ? 'selected' : '' }}>Psicología</option>
                            <option value="Educación" {{ $alumno->carrera == 'Educación' ? 'selected' : '' }}>Educación</option>
                        </select>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-success px-4">💾 Guardar Cambios</button>
                        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary px-4 ms-2">⬅ Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
