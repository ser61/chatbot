  <section class="content-header">
    <h1>
      Panel de Docentes
      <small>Administracion de datos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Docentes</li>
    </ol>

    <h2 style="text-align: center"><b>Lista de Docentes</b></h2>
  </section>

  <section class="content">
    @include('adm_escuela.docente.modals.crear')
    @include('adm_escuela.docente.modals.editar')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-danger">
          <div class="box-header">
            <h3 class="box-title">Informacion Basica de Docentes</h3>
            <a href="#" type="button" class="btn btn-primary btn-sm pull-right"
               data-toggle="modal" data-target="#create_docente" data-backdrop=”false”>
              <i class="fa fa-plus"></i>
               Agregar Docente
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nombre(s)</th>
                <th>Apellido(s)</th>
                <th>Celular</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach($docentes as $docente)
                @include('adm_escuela.docente.modals.confirm')
                <tr>
                  <td>{{ $docente->nombres }}</td>
                  <td>{{ $docente->apellidos }}</td>
                  <td>{{ $docente->celular }}</td>
                  <td colspan="3" style="text-align:center;">
                      <a href="#" class="btn btn-sm btn-info"
                         onclick="showModalEditDocente('{{ route('docentes.edit', $docente->id) }}')">
                        <i class="fa fa-edit"></i>
                      </a>
                      {{--<a href="#" class="btn btn-sm btn-success">
                        <i class="fa fa-eye"></i>
                      </a>--}}
                      <a class="btn btn-sm btn-danger btn-delete"
                         data-target="#modal_confirm-{{ str_replace(" ","-",$docente->nombres) }}-{{$docente->id}}"
                         data-toggle="modal" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </a>
                  </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
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