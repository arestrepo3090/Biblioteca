@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('flash::message')
</div>
<div class="card">
<div class="card-header">
    <strong>Crear Libro</strong>
</div>
<div class="card-body">
  <form action="/libro/guardar" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Autor">Autor</label>
                    <select class="form-control form-select" name="codigo" id="">
                    @foreach($autores as $key =>$value)
                        <option value="{{$value->idAutor}}">{{$value->nombre}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="Título">Título</label>
                    <input type="text" class="form-control @error('titulo') is_invalid @enderror" name="titulo">
                    @error('titulo')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="ISBN">ISBN</label>
                    <input type="text" class="form-control @error('isbn') is_invalid @enderror" name="isbn">
                    @error('isbn')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="Editorial">Editorial</label>
                    <input type="text" class="form-control @error('editorial') is_invalid @enderror" name="editorial">
                    @error('editorial')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="NumPags">Número de Páginas</label>
                    <input type="number" class="form-control @error('numPags') is_invalid @enderror" name="numPags">
                    @error('numPags')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right ms-3">Guardar</button>
        <a type="button" href="/libro" class="btn btn-secondary float-right ms-3">Regresar</a>
  </form>
</div>
</div>

@endsection
