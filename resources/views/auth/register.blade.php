@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card mb-4 mx-4">
            <div class="card-body p-4">
            <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Registro</h1>
            <p class="text-medium-emphasis">Crea tu cuenta</p>
            <div class="input-group mb-3"><span class="input-group-text">
                <svg class="icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-user"></use>
                    
                </svg></span>       
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3"><span class="input-group-text">
                <svg class="icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>
                </svg></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  placeholder="Correo electrónico" autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3"><span class="input-group-text">
                <svg class="icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-lock-locked"></use>
                </svg></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-4"><span class="input-group-text">
                <svg class="icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-lock-locked"></use>
                </svg></span>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirmar contraseña" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-block btn-success">
                {{ __('Crear cuenta') }}
            </button>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
