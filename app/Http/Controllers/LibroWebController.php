<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroWebController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'anio_publicacion' => 'required|integer',
            'genero' => 'required',
        ]);

        Libro::create($request->all());

        return redirect('/libros')->with('success', 'Libro agregado correctamente');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'anio_publicacion' => 'required|integer',
            'genero' => 'required',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($request->all());

        return redirect('/libros')->with('success', 'Libro actualizado correctamente');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect('/libros')->with('success', 'Libro eliminado correctamente');
    }
}
