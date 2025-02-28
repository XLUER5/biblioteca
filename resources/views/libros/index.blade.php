@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ __('Lista de Libros') }}</span>
                        <a href="{{ route('libros.create') }}" class="btn btn-primary btn-sm">Nuevo Libro</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Fecha de Publicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($libros as $libro)
                            <tr>
                                <td>{{ $libro->id }}</td>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor->nombre_completo }}</td>
                                <td>{{ date('d/m/Y', strtotime($libro->fecha_publicacion)) }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('libros.show', $libro->id) }}"
                                            class="btn btn-info btn-sm me-1">Ver</a>
                                        <a href="{{ route('libros.edit', $libro->id) }}"
                                            class="btn btn-warning btn-sm me-1">Editar</a>
                                        <button type="button" class="btn btn-danger btn-sm delete-libro me-1"
                                            data-id="{{ $libro->id }}"
                                            data-titulo="{{ $libro->titulo }}">Eliminar</button>
                                    </div>

                                    <form id="delete-form-{{ $libro->id }}"
                                        action="{{ route('libros.destroy', $libro->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay libros registrados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $libros->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Incluir SweetAlert2 desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Configuración de SweetAlert2 para eliminar libro
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-libro');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const libroId = this.getAttribute('data-id');
            const libroTitulo = this.getAttribute('data-titulo');

            Swal.fire({
                title: '¿Estás seguro?',
                html: `¿Deseas eliminar el libro <strong>"${libroTitulo}"</strong>?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si confirma, enviar el formulario
                    document.getElementById(`delete-form-${libroId}`).submit();
                }
            });
        });
    });
});
</script>
@endsection