<?php

// tests/Feature/LibroApiTest.php

namespace Tests\Feature;

use App\Models\Libro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;

class LibroApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_obtener_todos_los_libros()
    {
        $response = $this->getJson('/api/libros');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                '*' => ['id', 'titulo', 'autor', 'anio_publicacion', 'genero', 'created_at', 'updated_at'],
            ]);
    }

    public function test_puede_obtener_un_libro()
    {
        $libro = Libro::factory(\App\Models\Libro::class)->create();

        $response = $this->getJson("/api/libros/{$libro->id}");

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'id' => $libro->id,
                'titulo' => $libro->titulo,
                'autor' => $libro->autor,
                'anio_publicacion' => $libro->anio_publicacion,
                'genero' => $libro->genero,
            ]);
    }

    public function test_puede_agregar_un_libro()
    {
        $libroData = [
            'titulo' => 'Nuevo Libro',
            'autor' => 'Autor Nuevo',
            'anio_publicacion' => 2022,
            'genero' => 'Ficción',
        ];

        $response = $this->postJson('/api/libros', $libroData);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJson([
                'titulo' => $libroData['titulo'],
                'autor' => $libroData['autor'],
                'anio_publicacion' => $libroData['anio_publicacion'],
                'genero' => $libroData['genero'],
            ]);

        $this->assertDatabaseHas('libros', $libroData);
    }

    public function test_puede_editar_un_libro()
    {
        $libro = Libro::factory(\App\Models\Libro::class)->create();

        $nuevosDatos = [
            'titulo' => 'Nuevo Título',
            'autor' => 'Nuevo Autor',
            'anio_publicacion' => 2023,
            'genero' => 'Aventura',
        ];

        $response = $this->putJson("/api/libros/{$libro->id}", $nuevosDatos);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson($nuevosDatos);

        $this->assertDatabaseHas('libros', $nuevosDatos);
    }

    public function test_puede_eliminar_un_libro()
    {
        $libro = Libro::factory(\App\Models\Libro::class)->create();

        $response = $this->deleteJson("/api/libros/{$libro->id}");

        $response->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseMissing('libros', ['id' => $libro->id]);
    }

    public function test_no_puede_agregar_un_libro_sin_campos_requeridos()
    {
        $response = $this->postJson('/api/libros', []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors(['titulo', 'autor', 'anio_publicacion', 'genero']);
    }

    public function test_no_puede_editar_un_libro_sin_campos_requeridos()
    {
        $libro = Libro::factory(\App\Models\Libro::class)->create();

        $response = $this->putJson("/api/libros/{$libro->id}", []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors(['titulo', 'autor', 'anio_publicacion', 'genero']);
    }
}
