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
    <a href="/prestamo/crear" class="btn btn-primary link mb-3">Nuevo préstamo</a>
        <table id="prestamo" class="table table-border">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Título</th>
                    <th>Fecha préstamo</th>
                    <th>Fecha devolución</th>
                    <th>Estado</th>
                    <th>Cambiar Estado</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section("scripts")
<script>
$('#prestamo').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/prestamo/listar',
    columns: [
        {data: 'nombre', name: 'nombre'},
        {data: 'apellido', name: 'apellido'},
        {data: 'titulo', name: 'titulo'},
        {data: 'fecPrestamo', name: 'fecPrestamo'},
        {data: 'fecDevolucion', name: 'fecDevolucion'},
        {data: 'estado', name: 'estado'},
        {data: 'cambiar', name: 'cambiar', orderable: false, searchable: false}
    ]
});
</script>
@endsection

