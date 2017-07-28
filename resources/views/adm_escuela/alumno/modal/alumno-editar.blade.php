<div class="modal fade" id="edit_alumno" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 align="center">Panel de Edicion del <span class="text-bold">Alumno</span></h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label for="edit-alumno-nombre">Nombre(s) del Alumno:</label>
                        {!! Form::text('nombres',null,['class'=>'form-control','id'=>'edit-alumno-nombres']) !!}
                        <span class="help-block" id="editar-alumno-nombres" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <div class="form-group">
                        <label for="edit-alumno-apellidos">Apellido(s) del Alumno:</label>
                        {!! Form::text('apellidos',null,['class'=>'form-control','id'=>'edit-alumno-apellidos']) !!}
                        <span class="help-block" id="editar-alumno-apellidos" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <div class="form-group">
                        <label for="edit-alumno-ci">CI del Alumno:</label>
                        {!! Form::number('ci',null,['class'=>'form-control', 'id'=>'edit-alumno-ci']) !!}
                        <span class="help-block" id="editar-alumno-ci" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <div class="form-group">
                        <label for="edit-alumno-celular">Numero del Alumno:</label>
                        {!! Form::number('celular',null,['class'=>'form-control', 'id'=>'edit-alumno-celular']) !!}
                        <span class="help-block" id="editar-alumno-celular" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <div class="form-group">
                        <label for="edit-alumno-fecha_nacimiento">Fecha de Nacimiento:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right midato" id="datepicker" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                        </div>
                        <span class="help-block" id="editar-alumno-fecha_nacimiento" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="edit-alumno-token">
                    <input type="hidden" name="id" id="edit-alumno-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="editarAlumno('{{ route('alumnos.update',0) }}')" class="btn btn-primary pull-right" id="btnDocente">
                        Actualizar datos<i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>
