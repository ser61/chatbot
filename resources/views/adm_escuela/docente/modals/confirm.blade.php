<div class="modal fade"
     id="modal_confirm-{{ str_replace(" ","-",$docente->nombres) }}-{{$docente->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 align="center"><span class="text-bold">Esta eliminando un </span>Docente</h3>
        </div>

        <div class="box-body">
          <h4>Confirme si desea Eliminar al docente: {{$docente->nombres}}</h4>
        </div>

        {!! Form::open(['method'=>'DELETE', 'route'=>['docentes.destroy',$docente->id], 'id' => 'form-delete-docente']) !!}
        <div class="modal-footer">
          <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="deleteDocente('{{ route('docentes.destroy',$docente->id) }}')"
                  data-dismiss="modal" class="btn btn-danger pull-right">
            Continuar<i class="fa fa-arrow-circle-right"></i>
          </button>
        </div>
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>
