@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Libros</h2>
        <a href="{{ url('/libros/create') }}" class="btn btn-primary">Agregar Libro</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año de Publicación</th>
                    <th>Género</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libros as $libro)
                    <tr>
                        <td>{{ $libro->id }}</td>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>{{ $libro->anio_publicacion }}</td>
                        <td>{{ $libro->genero }}</td>
                        <td>
                            <a href="{{ url("/libros/{$libro->id}/edit") }}" class="btn btn-warning">Editar</a>
                            <form action="{{ url("/libros/{$libro->id}") }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No hay libros disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <style>
        body {
            background-image: url('https://i.pinimg.com/736x/94/93/1b/94931b132fa1c3e4d339ba151857d76a.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            flex: 1;
        }
    </style>
@endsection
