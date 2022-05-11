@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-group d-block d-md-flex row">
        <div class="card col-md-7 p-4 mb-0">
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <h1>Iniciar sesión</h1>
              <p class="text-medium-emphasis">Acceda a su cuenta</p>
              <div class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                  </svg></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-group mb-4"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                  </svg></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Recuérdame') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <button type="submit" class="btn btn-primary px-4">
                    {{ __('Ingresar') }}
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col text-start">
                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('¿Has olvidado tu contraseña?') }}
                    </a>
                  @endif
                </div>
              </div>
            </form>
          </div>  
        </div>
        <div class="card col-md-5 text-white bg-primary py-5">
          <div class="card-body text-center">
            <div>
              <h2>Crea una cuenta</h2>
              
              <a class="btn btn-lg btn-outline-light mt-3" type="button" href="/register">Registrarse!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
