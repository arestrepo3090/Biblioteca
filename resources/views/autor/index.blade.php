@extends ("layouts.app")

@section("content")

<div class="container-fluid">
    @include('flash::message')
</div>
<div>
    <form action="/autor/download" method="POST">
        @csrf
        <button class="btn btn-info mb-3" type="submit">
            Descargar PDF
            <svg class="icon">
                <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-cloud-download')}}"></use>
            </svg>
        </button>
    </form>
    </div>
<div class="card">
    <div class="card-header">
        <strong>Autores</strong>
    </div>
    <div class="card-body">
    <a href="/autor/crear" class="btn btn-primary mb-3">Nuevo autor</a>
        <table id="autor" class="table table-border">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Nacionalidad</th>
                    <th>Editar</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section("scripts")
<script>
$('#autor').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/autor/listar',
    columns: [
        {data: 'nombre', name: 'nombre'},
        {data: 'nacionalidad', name: 'nacionalidad'},
        {data: 'editar', name: 'editar', orderable: false, searchable: false},
    ]
});
</script>
@endsection
