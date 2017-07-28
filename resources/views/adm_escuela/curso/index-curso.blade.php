<section class="content-header">
  <h1>
    Panel de Cursos
    <small>Administracion de datos</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Cursos</li>
  </ol>

  <h2 style="text-align: center"><b>Panel de administracion de </b>Cursos</h2>
</section>

<section class="content">
  @include('adm_escuela.curso.create-curso')
  <div class="row">
    <section class="col-lg-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 align="center">Lista de <span class="text-bold">Materias</span></h3>
          <a href="#" type="button" class="btn btn-primary btn-sm pull-right"
             data-toggle="modal" data-target="#create_curso" data-backdrop=”false”>
            <i class="fa fa-plus"></i>
            Agregar Curso
          </a>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Grado</th>
              <th>Curso</th>
              <th>Capasidad</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cursos as $curso)
              <tr>
                <td>{{ $curso->nivel }}</td>
                <td>{{ $curso->paralelo }}</td>
                <td>{{ $curso->capacidad }}</td>
                <td colspan="1" style="text-align:center;">
                  <a class="btn btn-sm btn-danger btn-delete"
                     data-target="#modal_confirm-"
                     data-toggle="modal" class="btn btn-danger">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-sm btn-danger btn-delete"
                     data-target="#modal_confirm-"
                     data-toggle="modal" class="btn btn-danger">
                    <i class="fa fa-plus"></i>
                  </a>
                  <a class="btn btn-sm btn-danger btn-delete"
                     data-target="#modal_confirm-"
                     data-toggle="modal" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Grado</th>
              <th>Curso</th>
              <th>Capasidad</th>
              <th>Acciones</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>

    </section>

    <section class="col-lg-6">
      <div class="box box-danger">
        <div class="box-header">
          <h3 align="center"><span class="text-bold">Materias del</span> Curso</h3>
        </div>
        <!-- /.box-header -->
        <div id="curso-materia-body" class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Materia</th>
              <th>Docente</th>
              <th>Accion</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
              <th>Materia</th>
              <th>Docente</th>
              <th>Accion</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
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
  });
</script>