<div class="modal fade" id="crear_alumno" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 align="center">Panel de Registro de <span class="text-bold">Alumnos</span></h3>
                </div>

                <div class="box-body">

                    {!! Form::open(['route' => 'alumnos.store','method' => 'POST', 'id' => 'form-alumno']) !!}
                    <div class="form-group">
                        <label for="alumno-nombre">Nombre(s) del Alumno:</label>
                        {!! Form::text('nombres',null,['class'=>'form-control','id'=>'alumno-nombres']) !!}
                        <span class="help-block" id="crear-alumno-nombres" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <div class="form-group">
                        <label for="alumno-apellidos">Apellido(s) del Alumno:</label>
                        {!! Form::text('apellidos',null,['class'=>'form-control','id'=>'alumno-apellidos']) !!}
                        <span class="help-block" id="crear-alumno-apellidos" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <div class="form-group">
                        <label for="alumno-ci">CI del Alumno:</label>
                        {!! Form::number('ci',null,['class'=>'form-control', 'id'=>'alumno-ci']) !!}
                        <span class="help-block" id="crear-alumno-ci" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <div class="form-group">
                        <label for="alumno-celular">Numero del Alumno:</label>
                        {!! Form::number('celular',null,['class'=>'form-control', 'id'=>'alumno-celular']) !!}
                        <span class="help-block" id="crear-alumno-celular" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>

                    <div class="form-group">
                        <label for="alumno-fecha_nacimiento">Fecha de Nacimiento:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker" name="alumno-fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                        </div>
                        <span class="help-block" id="crear-alumno-fecha_nacimiento" style="display: none; color: red"><i class="fa fa-times-circle-o"></i></span>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="crearAlumno()" class="btn btn-primary pull-right" id="btnDocente">
                        Registrar Alumno <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>
