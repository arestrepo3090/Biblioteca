@extends ("layouts.app")

@section("content")
<div class="container-fluid">
    @include('flash::message')
</div>
<div class="card">
    <div class="card-header">
        <strong>Préstamos</strong>
    </div>
    <div class="card-body">
        <form action="/prestamo/guardar" method="post">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Información de usuario</strong>
                </div>
                <div class="row card-body">
                    <div class="form-group col-4">
                        <label for="">Documento</label>
                        <select name="documentos" id="documentos" class="form-control" onchange="colocar_nombre()">
                            <option value="">Seleccione</option>
                            @foreach($usuarios as $value)
                            <option nombre="{{$value->nombre}}" apellido="{{$value->apellido}}" value="{{ $value->idUsuario }}">
                                {{ $value->documento }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" readonly>
                    </div>
                    <div class="form-group col-4">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" id="apellido" readonly>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <strong>Información de libros</strong>
                </div>
                <div class="row card-body">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Título</label>
                            <select name="titulos" id="titulos" class="form-control" onchange="colocar_isbn()">
                                <option value="">Seleccione</option>
                                @foreach($libros as $value)
                                <option isbn="{{$value->isbn}}" value="{{$value->idLibro}}">
                                    {{$value->titulo}}
                                </option>
                                @endforeach
                            </select>
                        </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">ISBN</label>
                            <input type="text" id="isbn" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <button onclick="agregar_libro()" type="button"
                            class="btn btn-primary btn-sm float-right">Agregar</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>ISBN</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tblLibros">

                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary float-right ms-3">Guardar</button>
            <a type="button" href="/prestamo" class="btn btn-secondary float-right ms-3">Regresar</a>
        </form>
    </div>
</div>
@endsection


@section("scripts")
<script>
    function colocar_nombre() {
        let nombre = $("#documentos option:selected").attr("nombre");
        let apellido = $("#documentos option:selected").attr("apellido");
        $("#nombre").val(nombre);
        $("#apellido").val(apellido);
    }

    function colocar_isbn() {
        let isbn = $("#titulos option:selected").attr("isbn");
        $("#isbn").val(isbn);
    }

    function agregar_libro() {
        let libro_id = $("#titulos option:selected").val();
        let libro_text = $("#titulos option:selected").text();
        let isbn = $("#isbn").val();

        $("#tblLibros").append(`
            <tr id="tr-${libro_id}">
                <td>
                    <input type="hidden" id="libro_id[]" name="libro_id[]" value="${libro_id}" />
                    ${libro_text}
                </td>
                <td>${isbn}</td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="eliminar_libro(${libro_id})">X</button>
                </td>
            </tr>
        `);

    }

    function eliminar_libro(libro_id) {
        $("#tr-" + libro_id).remove();
    }

</script>
@endsection
