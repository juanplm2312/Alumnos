<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use App\Models\Alumnos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function test_se_listan_alumnos()
    {
        $this->actingAs($this->user);

        Alumnos::factory()->count(2)->create();

        $response = $this->get(route('alumno.index'));

        $response->assertStatus(200);
        $response->assertViewIs('alumno.index');
        $response->assertViewHas('alumnos');
    }

    /** @test */
    public function test_se_muestra_formulario_de_creacion()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('alumno.create'));

        $response->assertStatus(200);
        $response->assertViewIs('alumno.create');
    }

    /** @test */
    public function test_se_puede_crear_un_alumno()
    {
        $this->actingAs($this->user);

        $data = [
            'nombre' => 'Juan Pérez',
            'correo' => 'juan@example.com',
            'codigo' => 'A12345',
            'fecha_nacimiento' => '2000-05-10',
            'sexo' => 'M',
            'carrera' => 'Ingeniería',
        ];

        $response = $this->post(route('alumno.store'), $data);

        $response->assertRedirect(route('alumno.index'));
        // fecha_nacimiento may be stored with time in sqlite, check other fields and date prefix
        $this->assertDatabaseHas('alumnos', [
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'codigo' => $data['codigo'],
            'sexo' => $data['sexo'],
            'carrera' => $data['carrera'],
        ]);

    $record = DB::table('alumnos')->where('correo', $data['correo'])->first();
        $this->assertStringStartsWith($data['fecha_nacimiento'], $record->fecha_nacimiento);
    }

    /** @test */
    public function test_se_muestra_detalle_de_alumno()
    {
        $this->actingAs($this->user);

        $alumno = Alumnos::factory()->create();

        $response = $this->get(route('alumno.show', $alumno->id));

        $response->assertStatus(200);
        $response->assertViewIs('alumno.show');
        $response->assertViewHas('alumno', $alumno);
    }

    /** @test */
    public function test_se_muestra_formulario_de_edicion()
    {
        $this->actingAs($this->user);

        $alumno = Alumnos::factory()->create();

        $response = $this->get(route('alumno.edit', $alumno->id));

        $response->assertStatus(200);
        $response->assertViewIs('alumno.edit');
        $response->assertViewHas('alumno', $alumno);
    }

    /** @test */
    public function test_se_puede_editar_un_alumno()
    {
        $this->actingAs($this->user);

        $alumno = Alumnos::factory()->create();

        $data = [
            'nombre' => 'Actualizado',
            'correo' => 'nuevo@example.com',
            'codigo' => 'B99999',
            'fecha_nacimiento' => '1999-10-01',
            'sexo' => 'F',
            'carrera' => 'Derecho',
        ];

        $response = $this->put(route('alumno.update', $alumno->id), $data);

        $response->assertRedirect(route('alumno.index'));
        $this->assertDatabaseHas('alumnos', ['nombre' => 'Actualizado']);
    }

    /** @test */
    public function test_se_puede_eliminar_un_alumno()
    {
        $this->actingAs($this->user);

        $alumno = Alumnos::factory()->create();

        $response = $this->delete(route('alumno.destroy', $alumno->id));

        $response->assertRedirect(route('alumno.index'));
        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);
    }
}
