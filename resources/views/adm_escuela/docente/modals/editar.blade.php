<div class="modal fade" id="edit_docente" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 align="center">Panel de Edicion de <span class="text-bold">Docente</span></h3>
        </div>

        <div class="box-body">
          <div class="form-group">
            <label for="nombre">Nombre(s) del Docente:</label>
            {!! Form::text('nombres',null,['class'=>'form-control nombres','id'=>'nombres']) !!}
            <span class="help-block" id="edit-nombres" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="precio">Apellido(s) del Docente:</label>
            {!! Form::text('apellidos',null,['class'=>'form-control apellidos','id'=>'apellidos']) !!}
            <span class="help-block" id="edit-apellidos" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="cantidadTotal">Numero del Docente</label>
            {!! Form::number('celular',null,['class'=>'form-control celular', 'id'=>'celular']) !!}
            <span class="help-block" id="edit-celular" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right fecha_nacimiento" id="datepicker" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            </div>
            <span class="help-block" id="edit-fecha_nacimiento" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id" id="id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="editarDocente('{{ route('docentes.update',0) }}')" class="btn btn-primary pull-right" id="btnDocente">
            Actualizar datos<i class="fa fa-arrow-circle-right"></i>
          </button>
        </div>

      </div>

    </div>
  </div>
</div>
