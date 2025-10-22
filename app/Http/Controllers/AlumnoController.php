<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    

public function resetIds()
{
    // Si usas SQLite
    DB::statement('DELETE FROM sqlite_sequence WHERE name="alumnos"');
    return redirect()->back()->with('success', 'Los IDs de alumnos se reiniciaron correctamente.');
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $alumnos = Alumnos::all();
    return view('alumno.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:20',
            'correo' => 'required|email',
            'codigo' => 'required|max:10',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:M,F',
            'carrera' => 'required|max:50',
        ]);

        $alumnos = new Alumnos();
        $alumnos->nombre = $request->input('nombre');
        $alumnos->correo = $request->input('correo');
        $alumnos->codigo = $request->input('codigo');
        $alumnos->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumnos->sexo = $request->input('sexo');
        $alumnos->carrera = $request->input('carrera');
        $alumnos->save();
        
    return redirect()->route('alumno.index')->with('success', 'Alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumnos $alumno)
    {
    return view('alumno.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumnos $alumno)
    {
    return view('alumno.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumnos $alumno)
    {

        $alumno->nombre = $request->input('nombre');
        $alumno->correo = $request->input('correo');
        $alumno->codigo = $request->input('codigo');
        $alumno->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumno->sexo = $request->input('sexo');
        $alumno->carrera = $request->input('carrera');
        $alumno->save();
        
    return redirect()->route('alumno.index')->with('success', 'Alumno actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumnos $alumno)
    {
        $alumno->delete();
    return redirect()->route('alumno.index')->with('success', 'Alumno eliminado correctamente');
    }

}