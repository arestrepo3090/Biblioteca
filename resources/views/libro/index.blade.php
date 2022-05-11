@extends ("layouts.app")

@section("content")

<div class="container-fluid">
    @include('flash::message')
</div>
<div>
<form action="/libro/download" method="POST">
    @csrf
    <button class="btn btn-info mb-3" type="submit">
        Generar PDF
        <svg class="icon">
            <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-cloud-download')}}"></use>
        </svg>
    </button>
</form>
</div>
<div class="card">
    <div class="card-header">
        <strong>Libros</strong>
    </div>
    <div class="card-body">
    <a href="/libro/crear" class="btn btn-primary link mb-3">Nuevo libro</a>
        <table id="libro" class="table table-border">
            <thead>
                <tr>
                    <th>Autor</th>
                    <th>Título</th>
                    <th>ISBN</th>
                    <th>Editorial</th>
                    <th>Páginas</th>
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
$('#libro').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/libro/listar',
    columns: [
        {data: 'nombre', name: 'nombre'},
        {data: 'titulo', name: 'titulo'},
        {data: 'isbn', name: 'isbn'},
        {data: 'editorial', name: 'editorial'},
        {data: 'numPags', name: 'numPags'},
        {data: 'estado', name: 'estado'},
        {data: 'editar', name: 'editar', orderable: false, searchable: false},
        {data: 'cambiar', name: 'cambiar', orderable: false, searchable: false}
    ]
});
</script>
@endsection
