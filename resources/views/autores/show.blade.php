@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ __('Detalles del Autor') }}</span>
                        <a href="{{ route('autores.index') }}" class="btn btn-secondary btn-sm">Volver a la lista</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th style="width: 200px;">ID:</th>
                            <td>{{ $autor->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre Completo:</th>
                            <td>{{ $autor->nombre_completo }}</td>
                        </tr>
                        <tr>
                            <th>Nacionalidad:</th>
                            <td>{{ $autor->nacionalidad }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento:</th>
                            <td>{{ date('d/m/Y', strtotime($autor->fecha_nacimiento)) }}</td>
                        </tr>
                    </table>

                    <h4 class="mt-4 mb-3">Libros de este autor</h4>

                    @if($autor->libros->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Fecha de Publicación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($autor->libros as $libro)
                                <tr>
                                    <td>{{ $libro->id }}</td>
                                    <td>{{ $libro->titulo }}</td>
                                    <td>{{ date('d/m/Y', strtotime($libro->fecha_publicacion)) }}</td>
                                    <td>
                                        <a href="{{ route('libros.show', $libro->id) }}"
                                            class="btn btn-info btn-sm">Ver</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-info">
                        Este autor no tiene libros registrados.
                    </div>
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Estás seguro de eliminar este autor?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection