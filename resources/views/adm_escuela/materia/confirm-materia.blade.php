<div class="modal fade"
     id="modal_confirm-materia{{str_replace(" ", "-", $materia->nombre)}}-{{$materia->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 align="center"><span class="text-bold">Esta eliminando una </span>Materia</h3>
        </div>

        <div class="box-body">
          <h4>Confirme si desea Eliminar la materia: {{$materia->nombre}}</h4>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="token-delete-materia" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="deleteMateria('{{ route('materias.destroy',$materia->id) }}')"
                  data-dismiss="modal" class="btn btn-danger pull-right">
            Continuar<i class="fa fa-arrow-circle-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
