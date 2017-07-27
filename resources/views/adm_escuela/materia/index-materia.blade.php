<section class="content-header">
  <h1>
    Panel de Materias
    <small>Administracion de datos</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Materias</li>
  </ol>

  <h2 style="text-align: center"><b>Lista de Materias</b></h2>
</section>

<section class="content">
  <div class="row">
    <section class="col-lg-6">

        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 align="center">Panel de Registro de <span class="text-bold">Materias</span></h3>
          </div>
          <div class="box-body">
            {!! Form::open(['route' => 'materias.store','method' => 'POST', 'id' => 'form-add-materia']) !!}
            <div class="form-group">
              <label for="nombre">Nombre de Materia:</label>
              {!! Form::text('nombre',null,['class'=>'form-control','id'=>'nombres']) !!}
              <span class="help-block" id="create-materia-nombre" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
            </div>
            {!! Form::close() !!}
          </div>
          <div class="modal-footer">
            <a type="button" onclick="crearMateria()" class="btn btn-block btn-primary" id="btn-add-materia">
              Registrar Materia <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="box box-danger">

          <div class="box-header with-border">
            <h3 align="center">Panel de Edicion de <span class="text-bold">Materias</span></h3>
            <p align="center">Seleccione una materia de la tabla para actualizar</p>
          </div>

          <div class="box-body">
            <div class="form-group">
              <input type="hidden" id="token-materia" value="{{ csrf_token() }}">
              <input type="hidden" name="id" id="materia-id">
              <label for="nombre">Nombre de Materia:</label>
              {!! Form::text('nombre',null,['class'=>'form-control','id'=>'nombre-materia', 'readonly']) !!}
              <span class="help-block" id="edit-materia-nombre" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="editarMateria('{{ route('materias.update',':id') }}')" class="btn btn-block btn-primary" id="btn-add-materia">
              Actualizar Materia <i class="fa fa-arrow-circle-right"></i>
            </button>
          </div>

        </div>
    </section>

    <section class="col-lg-6">
        <div class="box box-danger">
          <div class="box-header">
            <h3 align="center"><span class="text-bold">Informacion Basica de</span> Materias</h3>
          </div>
          <!-- /.box-header -->
          <div id="materias-body" class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach($materias as $materia)
                @include('adm_escuela.materia.confirm-materia')
                <tr>
                  <td onclick="cargarEditarMateria('{{ $materia->id }}', '{{ $materia->nombre }}')">
                    {{ $materia->nombre }}
                  </td>
                  <td colspan="3" style="text-align:center;">
                    {{--<a href="#" class="btn btn-sm btn-success">
                      <i class="fa fa-eye"></i>
                    </a>--}}
                    <a class="btn btn-sm btn-danger btn-delete"
                       data-target="#modal_confirm-materia{{ str_replace(" ", "-", $materia->nombre) }}-{{$materia->id}}"
                       data-toggle="modal" class="btn btn-danger">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
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