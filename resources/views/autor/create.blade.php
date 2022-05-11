@extends ("layouts.app")

@section("content")
<div class="container-fluid">
    @include('flash::message')
</div>
<div class="card">
<div class="card-header">
    <strong>Crear Autor</strong>
</div>
<div class="card-body">
  <form action="/autor/guardar" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is_invalid @enderror" name="nombre">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="Nacionalidad">Nacionalidad</label>
                    <input type="text" class="form-control @error('nacionalidad') is_invalid @enderror" name="nacionalidad">
                    @error('nacionalidad')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right ms-3">Guardar</button>
        <a type="button" href="/autor" class="btn btn-secondary float-right ms-3">Regresar</a>
  </form>
</div>
</div>

@endsection
