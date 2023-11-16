@extends('layouts.app')

@section('content')
    <div class="background">
        <div class="container">
            <h2>Agregar Nuevo Libro</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/libros') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                </div>
                <div class="mb-3">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}">
                </div>
                <div class="mb-3">
                    <label for="anio_publicacion" class="form-label">Año de Publicación</label>
                    <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" value="{{ old('anio_publicacion') }}">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero') }}">
                </div>
                <button type="submit" class="btn btn-primary">Agregar Libro</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>

    <!-- Estilos en línea -->
    <style>
        body {
            background-image: url('https://fondosmil.com/fondo/1684.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .background {
            background: rgba(255, 255, 255, 0.8);
            flex: 1;
        }

        .container {
            padding: 20px;
        }
    </style>
@endsection
