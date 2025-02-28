@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido</div>

                <div class="card-body">
                    <p>Bienvenido a la Biblioteca Virtual</p>

                    @guest
                    <p>Por favor inicia sesión o regístrate para acceder al sistema.</p>
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="btn btn-primary mx-2">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary mx-2">Registrarse</a>
                    </div>
                    @else
                    <p>Ya has iniciado sesión.</p>
                    <div class="text-center mt-3">
                        <a href="{{ route('home') }}" class="btn btn-primary">Ir al Panel</a>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection