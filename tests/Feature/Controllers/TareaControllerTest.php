<?php

use App\Models\Alumnos;
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('muestra listado de tareas', function () 
    {
        $alumnos= Alumnos::factory()->create();

        $this->get



    };