<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\AutorRequest;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $autores = Autor::where('activo', 1)->orderBy('id')->paginate(10);
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(AutorRequest $request)
    {
        Autor::create($request->validated());
        return redirect()->route('autores.index')
            ->with('success', 'Autor creado exitosamente.');
    }

    public function show(Autor $autor)
    {
        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(AutorRequest $request, Autor $autor)
    {
        $autor->update($request->validated());
        return redirect()->route('autores.index')
            ->with('success', 'Autor actualizado exitosamente.');
    }

    public function destroy(Autor $autor)
    {
        if ($autor->libros()->where('activo', 1)->exists()) {
            return redirect()->route('autores.index')
                ->with('error', 'No se puede eliminar el autor porque tiene libros asociados');
        }
    
        $autor->activo = 0;
        $autor->save();
    
        return redirect()->route('autores.index')
            ->with('success', 'Autor eliminado exitosamente.');
    }
}