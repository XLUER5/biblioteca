@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Nuevo Autor') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('autores.store') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="nombre_completo"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_completo" type="text"
                                    class="form-control @error('nombre_completo') is-invalid @enderror"
                                    name="nombre_completo" value="{{ old('nombre_completo') }}" required autofocus>

                                @error('nombre_completo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nacionalidad"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nacionalidad') }}</label>

                            <div class="col-md-6">
                                <input id="nacionalidad" type="text"
                                    class="form-control @error('nacionalidad') is-invalid @enderror" name="nacionalidad"
                                    value="{{ old('nacionalidad') }}" required>

                                @error('nacionalidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="fecha_nacimiento"
                                class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date"
                                    class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                    name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>

                                @error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                <a href="{{ route('autores.index') }}" class="btn btn-secondary">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection