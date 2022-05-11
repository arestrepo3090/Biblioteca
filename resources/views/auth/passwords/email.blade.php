@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card mb-4 mx-4">
            <div class="card-body p-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h3>Restablecer contraseña</h3>
                    <p class="text-medium-emphasis">Obtén un enlace de restablecimiento de contraseña</p>
                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>
                        </svg></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>            
                    <button type="submit" class="btn btn-block btn-success">
                        {{ __('Enviar enlace') }}
                    </button>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
