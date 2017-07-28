<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>Materia</th>
    <th>Docente</th>
    <th>Acciones</th>
  </tr>
  </thead>
  <tbody>
  @foreach($materias as $materia)
    <tr>
      <td>{{ $materia->nombres }}</td>
      <td>{{ $materia->docente }}</td>
      <td colspan="1" style="text-align:center;">
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
    <th>Materia</th>
    <th>Docente</th>
    <th>Acciones</th>
  </tr>
  </tfoot>
</table>
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