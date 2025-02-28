@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ __('Detalles del Libro') }}</span>
                        <a href="{{ route('libros.index') }}" class="btn btn-secondary btn-sm">Volver a la lista</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th style="width: 200px;">ID:</th>
                            <td>{{ $libro->id }}</td>
                        </tr>
                        <tr>
                            <th>Título:</th>
                            <td>{{ $libro->titulo }}</td>
                        </tr>
                        <tr>
                            <th>Autor:</th>
                            <td>
                                <a href="{{ route('autores.show', $libro->autor_id) }}">
                                    {{ $libro->autor->nombre_completo }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td style="white-space: pre-line;">{{ $libro->descripcion }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Publicación:</th>
                            <td>{{ date('d/m/Y', strtotime($libro->fecha_publicacion)) }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Creación:</th>
                            <td>{{ $libro->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $libro->updated_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    </table>

                    <div class="mt-3">
                        <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Estás seguro de eliminar este libro?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection