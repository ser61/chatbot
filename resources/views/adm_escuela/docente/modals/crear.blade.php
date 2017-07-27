<div class="modal fade" id="create_docente" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 align="center">Panel de Registro de <span class="text-bold">Docente</span></h3>
        </div>

        <div class="box-body">

          {!! Form::open(['route' => 'docentes.store','method' => 'POST', 'id' => 'form-docente']) !!}
          <div class="form-group">
            <label for="nombre">Nombre(s) del Docente:</label>
            {!! Form::text('nombres',null,['class'=>'form-control','id'=>'nombres']) !!}
            <span class="help-block" id="create-nombres" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="precio">Apellido(s) del Docente:</label>
            {!! Form::text('apellidos',null,['class'=>'form-control','id'=>'apellidos']) !!}
            <span class="help-block" id="create-apellidos" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="cantidadTotal">Numero del Docente</label>
            {!! Form::number('celular',null,['class'=>'form-control', 'id'=>'celular']) !!}
            <span class="help-block" id="create-celular" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            </div>
            <span class="help-block" id="create-fecha_nacimiento" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>
          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="crearDocente()" class="btn btn-primary pull-right" id="btnDocente">
            Registrar Docente <i class="fa fa-arrow-circle-right"></i>
          </button>
        </div>

      </div>

    </div>
  </div>
</div>
