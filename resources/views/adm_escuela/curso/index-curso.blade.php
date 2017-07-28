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
  @include('adm_escuela.curso.edit-curso')
  <div class="row">
    <section class="col-lg-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 align="center">Lista de <span class="text-bold">Materias</span></h3>
          <p align="center"> Haz click en grado para ver las materias</p>
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
                <td onclick="verMaterias('{{ route('materia-curso.show', $curso->id) }}')">{{ $curso->nivel }}</td>
                <td>{{ $curso->paralelo }}</td>
                <td>{{ $curso->capacidad }}</td>
                <td colspan="1" style="text-align:center;">
                  <a class="btn btn-sm btn-warning btn-curso-edit"
                     onclick="cargarEditarCurso('{{ route('cursos.edit', $curso->id) }}')">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-sm btn-primary"
                      onclick="cargarCrearMateriaCurso('{{ $curso->id }}')">
                    <i class="fa fa-plus"></i>
                  </a>
                  <a class="btn btn-sm btn-danger btn-curso-delete"
                     data-target="#modal_confirm-"
                     data-toggle="modal">
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
      <div id="tableMateria" class="box box-danger">
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
            @foreach($asignaciones as $asignacione)
              <tr>
                <td>{{ $asignacione->materia }}</td>
                <td>{{ $asignacione->docente }}</td>
                <td colspan="1" style="text-align:center;">
                  <a class="btn btn-sm btn-warning btn-curso-edit">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-sm btn-danger btn-curso-delete">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
            @endforeach
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

      <div id="agregarMateria" class="box box-danger" hidden>

        <div class="box-header with-border">
          <h3 align="center">Panel de Edicion de <span class="text-bold">Curso</span></h3>
        </div>

        <div class="box-body">

          <div class="form-group">
            <label for="agregar-materia">Materias:</label>
            {!! Form::select('materia_id', $materias ,null,['class'=>'form-control','id'=>'agregar-materia']) !!}
            <span class="help-block" id="agregar-materia_id" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="agregar-persona">Docentes:</label>
            {!! Form::select('persona_id', $docentes ,null,['class'=>'form-control','id'=>'agregar-persona']) !!}
            <span class="help-block" id="agregar-persona_id" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="agregar-curso-token">
          <input type="hidden" name="id" id="agregar-curso">
        </div>
        <div class="modal-footer">
          <button type="button" onclick="crearMateriaCurso('{{ route('materia-curso.store') }}')" class="btn btn-primary pull-right" id="btnDocente">
            Agregar <i class="fa fa-arrow-circle-right"></i>
          </button>
        </div>

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