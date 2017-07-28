<div class="modal fade" id="edit-curso" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 align="center">Panel de Edicion de <span class="text-bold">Curso</span></h3>
        </div>

        <div class="box-body">
          <div class="form-group">
            <label for="nombre">Grado:</label>
            {!! Form::text('nivel',null,['class'=>'form-control nivel', 'placeholder' => 'Cuarto o 4to','id'=>'nivel-edit']) !!}
            <span class="help-block" id="edit-curso-nivel" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="paralelo"></label>
            <select name="paralelo" id="paralelo-editar" class="form-control paralelo select2" style="width: 100%;">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">F</option>
              <option value="G">G</option>
              <option value="H">H</option>
              <option value="I">I</option>
            </select>
            <span class="help-block" id="edit-curso-paralelo" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>

          <div class="form-group">
            <label for="capacidad">Capacidad de alumnos:</label>
            {!! Form::number('capacidad',null,['class'=>'form-control', 'id'=>'capacidad-editar']) !!}
            <span class="help-block" id="edit-curso-capacidad" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="curso-edit-token">
          <input type="hidden" name="id" id="edit-id-curso">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="editarCurso('{{ route('cursos.update',':id') }}')" class="btn btn-primary pull-right" id="btnDocente">
            Actualizar datos<i class="fa fa-arrow-circle-right"></i>
          </button>
        </div>

      </div>

    </div>
  </div>
</div>
