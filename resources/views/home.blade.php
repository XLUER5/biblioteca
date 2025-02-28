@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Mensaje de estado -->
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Encabezado principal -->
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center py-4">
                    <h4 class="mb-3">{{ __('¡Bienvenido a su Biblioteca Digital!') }}</h4>
                    <p class="text-muted">
                        {{ __('Gestione su colección de libros y autores de manera fácil y eficiente.') }}</p>
                </div>
            </div>

            <!-- Tarjetas de estadísticas -->
            <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="fas fa-book fa-3x text-primary mb-3"></i>
                            <h5>{{ __('Libros') }}</h5>
                            <h2 class="mb-0">{{ $librosCount ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="fas fa-user-edit fa-3x text-success mb-3"></i>
                            <h5>{{ __('Autores') }}</h5>
                            <h2 class="mb-0">{{ $autoresCount ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjetas de acciones -->
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ __('Gestión de Autores') }}</h5>
                            <p class="card-text flex-grow-1">
                                {{ __('Agregue, edite o elimine autores de su biblioteca. Mantenga un registro organizado de todos los escritores.') }}
                            </p>
                            <a href="{{ route('autores.index') }}" class="btn btn-primary">
                                <i class="fas fa-users me-2"></i>{{ __('Administrar Autores') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ __('Gestión de Libros') }}</h5>
                            <p class="card-text flex-grow-1">
                                {{ __('Controle su inventario de libros. Añada nuevos títulos o actualice la información ') }}
                            </p>
                            <a href="{{ route('libros.index') }}" class="btn btn-secondary">
                                <i class="fas fa-book-open me-2"></i>{{ __('Administrar Libros') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Podemos agregar JavaScript para datos dinámicos o animaciones aquí
</script>
@endsection