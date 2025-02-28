<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Http\Requests\LibroRequest;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $libros = Libro::with('autor')->where('activo', 1)->orderBy('id')->paginate(10);
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $autores = Autor::where('activo', 1)->orderBy('id')->pluck('nombre_completo', 'id');
        return view('libros.create', compact('autores'));
    }

    public function store(LibroRequest $request)
    {
        Libro::create($request->validated());
        return redirect()->route('libros.index')
            ->with('success', 'Libro creado exitosamente.');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $autores = Autor::where('activo', 1)->orderBy('id')->pluck('nombre_completo', 'id');
        return view('libros.edit', compact('libro', 'autores'));
    }

    public function update(LibroRequest $request, Libro $libro)
    {
        $libro->update($request->validated());
        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->activo = 0;
        $libro->save();
        return redirect()->route('libros.index')
            ->with('success', 'Libro desactivado exitosamente.');
    }
}