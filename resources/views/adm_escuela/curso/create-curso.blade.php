<div class="modal fade" id="create_curso" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 align="center">Panel de Registro de <span class="text-bold">Curso</span></h3>
        </div>

        <div class="box-body">

          {!! Form::open(['route' => 'cursos.store','method' => 'POST', 'id' => 'form-create-curso']) !!}
          <div class="form-group">
            <label for="nombre">Grado:</label>
            {!! Form::text('nivel',null,['class'=>'form-control', 'placeholder' => 'Cuarto o 4to','id'=>'id-nivel']) !!}
            <span class="help-block" id="create-nivel" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="paralelo"></label>
            <select name="paralelo" id="paralelo" class="form-control select2" style="width: 100%;">
              <option value="1">A</option>
              <option value="2">B</option>
              <option value="3">C</option>
              <option value="4">D</option>
              <option value="5">E</option>
              <option value="6">F</option>
              <option value="7">G</option>
              <option value="8">H</option>
              <option value="9">I</option>
            </select>
            <span class="help-block" id="create-paralelo" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="capacidad">Capacidad de alumnos:</label>
            {!! Form::number('capacidad',null,['class'=>'form-control', 'id'=>'id-capacidad']) !!}
            <span class="help-block" id="create-capacidad" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="crearCurso()" class="btn btn-primary pull-right" id="btnCurso">
            Registrar Curso <i class="fa fa-arrow-circle-right"></i>
          </button>
        </div>

      </div>

    </div>
  </div>
</div>
