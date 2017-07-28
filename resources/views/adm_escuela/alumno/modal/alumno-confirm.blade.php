<div class="modal fade"
     id="modal-alumno_confirm-alum-{{ str_replace(" ","-",$alumno->nombres) }}-{{$alumno->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 align="center"><span class="text-bold">Esta eliminando un </span>Alumno</h3>
                </div>

                <div class="box-body">
                    <h4>Confirme si desea Eliminar al alumno: {{$alumno->nombres}}</h4>
                </div>

                {!! Form::open(['method'=>'DELETE', 'route'=>['alumnos.destroy',$alumno->id], 'id' => 'form-delete-alumno']) !!}
                <div class="modal-footer">
                    <input type="hidden" id="alumno-token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="deleteAlumnos('{{ route('alumnos.destroy',$alumno->id) }}')"
                            data-dismiss="modal" class="btn btn-danger pull-right">
                        Continuar<i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
