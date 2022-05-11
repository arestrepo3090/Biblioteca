@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('flash::message')
</div>
<div class="card">
<div class="card-header">
    <strong>Modificar usuario</strong>
</div>
<div class="card-body">
  <form action="/usuario/actualizar" method="POST">
        @csrf
        <input type="hidden" name="idUsuario" value="{{$usuario->idUsuario}}"/>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input value="{{$usuario->documento}}" type="number" class="form-control @error('documento') is_invalid @enderror" name="documento">
                    @error('documento')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input value="{{$usuario->nombre}}" type="text" class="form-control @error('nombre') is_invalid @enderror" name="nombre">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input value="{{$usuario->apellido}}" type="text" class="form-control @error('apellido') is_invalid @enderror" name="apellido">
                    @error('apellido')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input value="{{$usuario->direccion}}" type="text" class="form-control @error('direccion') is_invalid @enderror" name="direccion">
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input value="{{$usuario->telefono}}" type="text" class="form-control @error('telefono') is_invalid @enderror" name="telefono">
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right ms-3">Guardar</button>
        <a type="button" href="/usuario" class="btn btn-secondary float-right ms-3">Regresar</a>
  </form>
</div>
</div>

@endsection
