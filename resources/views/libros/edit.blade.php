@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Libro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('libros.update', $libro->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-3">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text"
                                    class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                    value="{{ old('titulo', $libro->titulo) }}" required autofocus>

                                @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="descripcion"
                                class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion"
                                    class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                    required rows="4">{{ old('descripcion', $libro->descripcion) }}</textarea>

                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="fecha_publicacion"
                                class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Publicación') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_publicacion" type="date"
                                    class="form-control @error('fecha_publicacion') is-invalid @enderror"
                                    name="fecha_publicacion"
                                    value="{{ old('fecha_publicacion', $libro->fecha_publicacion) }}" required>

                                @error('fecha_publicacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="autor_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('Autor') }}</label>

                            <div class="col-md-6">
                                <select id="autor_id" class="form-control @error('autor_id') is-invalid @enderror"
                                    name="autor_id" required>
                                    <option disabled value="">Seleccione un autor</option>
                                    @foreach($autores as $id => $nombre)
                                    <option value="{{ $id }}"
                                        {{ (old('autor_id', $libro->autor_id) == $id) ? 'selected' : '' }}>{{ $nombre }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('autor_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                                <a href="{{ route('libros.index') }}" class="btn btn-secondary">
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