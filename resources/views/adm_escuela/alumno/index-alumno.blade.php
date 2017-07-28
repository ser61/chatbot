<section class="content-header">
    <h1>
        Panel de Alumnos
        <small>Administracion de datos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Alumnos</li>
    </ol>

    <h2 style="text-align: center"><b>Lista de Alumnos</b></h2>
</section>

<section class="content">
    @include('adm_escuela.alumno.modal.alumno-crear')
    @include('adm_escuela.alumno.modal.alumno-editar')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Informacion Basica de los Alumnos</h3>
                    <a href="#" type="button" class="btn btn-primary btn-sm pull-right"
                       data-toggle="modal" data-target="#crear_alumno" data-backdrop=”false”>
                        <i class="fa fa-plus"></i>
                        Agregar Alumno
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombre(s)</th>
                            <th>Apellido(s)</th>
                            <th>Celular</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alumnos as $alumno)
                            @include('adm_escuela.alumno.modal.alumno-confirm')
                            <tr>
                                <td>{{ $alumno->ci }}</td>
                                <td>{{ $alumno->nombres }}</td>
                                <td>{{ $alumno->apellidos }}</td>
                                <td>{{ $alumno->celular }}</td>
                                <td colspan="3" style="text-align:center;">
                                    <a href="#" class="btn btn-sm btn-info"
                                       onclick="showModalEditAlumno('{{ route('alumnos.edit', $alumno->id) }}')">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger btn-delete"
                                       data-target="#modal-alumno_confirm-alum-{{ str_replace(" ","-",$alumno->nombres) }}-{{$alumno->id}}"
                                       data-toggle="modal" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>CI</th>
                            <th>Nombre(s)</th>
                            <th>Apellido(s)</th>
                            <th>Celular</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
</section>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
        $('#datepicker').datepicker({
            autoclose: true
        });
    });
</script>