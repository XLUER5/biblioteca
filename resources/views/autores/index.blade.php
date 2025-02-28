@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ __('Lista de Autores') }}</span>
                        <a href="{{ route('autores.create') }}" class="btn btn-primary btn-sm">Nuevo Autor</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Nacionalidad</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($autores as $autor)
                            <tr>
                                <td>{{ $autor->id }}</td>
                                <td>{{ $autor->nombre_completo }}</td>
                                <td>{{ $autor->nacionalidad }}</td>
                                <td>{{ date('d/m/Y', strtotime($autor->fecha_nacimiento)) }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('autores.show', $autor->id) }}"
                                            class="btn btn-info btn-sm me-1">Ver</a>
                                        <a href="{{ route('autores.edit', $autor->id) }}"
                                            class="btn btn-warning btn-sm me-1">Editar</a>
                                        <button type="button" class="btn btn-danger btn-sm delete-autor"
                                            data-id="{{ $autor->id }}"
                                            data-nombre="{{ $autor->nombre_completo }}">Eliminar</button>
                                    </div>

                                    <form id="delete-form-{{ $autor->id }}"
                                        action="{{ route('autores.destroy', $autor->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay autores registrados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $autores->links() }}
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
// Configuración de SweetAlert2 para eliminar autor
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-autor');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const autorId = this.getAttribute('data-id');
            const autorNombre = this.getAttribute('data-nombre');

            Swal.fire({
                title: '¿Estás seguro?',
                html: `¿Deseas eliminar al autor <strong>${autorNombre}</strong>?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si confirma, enviar el formulario
                    document.getElementById(`delete-form-${autorId}`).submit();
                }
            });
        });
    });
});
</script>
@endsection