@extends('layouts.app')

@section('content')
    <div class="container edit-container">
        <h2>Editar Libro</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url("/libros/{$libro->id}") }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}">
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor', $libro->autor) }}">
            </div>
            <div class="mb-3">
                <label for="anio_publicacion" class="form-label">Año de Publicación</label>
                <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" value="{{ old('anio_publicacion', $libro->anio_publicacion) }}">
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero', $libro->genero) }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Libro</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
    
    <style>
        body {
            background-image: url('https://www.65ymas.com/uploads/s1/29/71/42/5-libros-imprescindibles-con-barcelona-como-telo-n-de-fondo.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .edit-container {
            background: rgba(255, 255, 255, 0.8);
            flex: 1;
        }
    </style>
@endsection
