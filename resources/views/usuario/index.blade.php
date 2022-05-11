@extends ("layouts.app")

@section("content")

<div class="container-fluid">
    @include('flash::message')
</div>
<div class="card">
    <div class="card-header">
        <strong>Usuarios</strong>
    </div>
    <div class="card-body">
    <a href="/usuario/crear" class="btn btn-primary link mb-3">Nuevo usuario</a>
        <table id="usuario" class="table table-border">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section("scripts")
<script>
$('#usuario').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/usuario/listar',
    columns: [
        {data: 'documento', name: 'documento'},
        {data: 'nombre', name: 'nombre'},
        {data: 'apellido', name: 'apellido'},
        {data: 'direccion', name: 'direccion'},
        {data: 'telefono', name: 'telefono'},
        {data: 'estado', name: 'estado'},
        {data: 'editar', name: 'editar', orderable: false, searchable: false},
        {data: 'cambiar', name: 'cambiar', orderable: false, searchable: false}
    ]
});
</script>
@endsection
