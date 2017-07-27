@extends('layouts.app')

@section('content')
  <div class="register-box">
    <div class="register-logo">
      <a href="{{url('/')}}"><b>Chatbot </b>School</a>
    </div>

    <div class="register-box-body">

      <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}
        <label style="display: block; text-align: center" title> Registro:</label>
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('name'))
            <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <input type="text" class="form-control" placeholder="Nombre de cuenta..." name="name" value="{{ old('name') }}">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if ($errors->has('name'))
            <span class="help-block">*{{ $errors->first('name') }}</span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('email'))
            <label class="control-label" for="email"><i class="fa fa-times-circle-o"></i> Input with
              error</label>
          @endif
          <input type="email" class="form-control" placeholder="Email..." name="email" value="{{ old('email') }}">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if ($errors->has('email'))
            <span class="help-block">*{{ $errors->first('email') }}</span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('password'))
            <label class="control-label" for="password"><i class="fa fa-times-circle-o"></i> Input with
              error</label>
          @endif
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @if ($errors->has('password'))
            <span class="help-block">*{{ $errors->first('password') }}</span>
          @endif
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <label style="display: block; text-align: center" title> Datos Personales:</label>
        <div class="form-group {{ $errors->has('nombres') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('nombres'))
            <label class="control-label" for="nombres"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <input type="text" class="form-control" placeholder="Nombre(s) de usuario..." name="nombres" value="{{ old('nombres') }}">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if ($errors->has('nombres'))
            <span class="help-block">*{{ $errors->first('nombres') }}</span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('apellidos') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('apellidos'))
            <label class="control-label" for="apellidos"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <input type="text" class="form-control" placeholder="Apellidos(s) de usuario..." name="apellidos" value="{{ old('apellidos') }}">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if ($errors->has('apellidos'))
            <span class="help-block">*{{ $errors->first('apellidos') }}</span>
          @endif
        </div>

        <div class="form-group">
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" placeholder="Fecha de nacimiento..." id="datepicker" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
          </div>
        </div>

        <div class="form-group {{ $errors->has('celular') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('celular'))
            <label class="control-label" for="celular"><i class="fa fa-times-circle-o"></i> Input with
              error</label>
          @endif
          <input type="number" class="form-control" placeholder="Celular..." name="celular" value="{{ old('celular') }}">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          @if ($errors->has('celular'))
            <span class="help-block">*{{ $errors->first('celular') }}</span>
          @endif
        </div>

        <label style="display: block; text-align: center" title> Datos del Colegio:</label>
        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('nombre'))
            <label class="control-label" for="nombre"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <input type="text" class="form-control" placeholder="Nombre del colegio..." name="nombre" value="{{ old('nombre') }}">
          <span class="glyphicon glyphicon-book form-control-feedback"></span>
          @if ($errors->has('nombre'))
            <span class="help-block">*{{ $errors->first('nombre') }}</span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('codigo_seduca') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('codigo_seduca'))
            <label class="control-label" for="codigo_seduca"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <input type="text" class="form-control" placeholder="Codigo-Seduca del colegio..." name="codigo_seduca" value="{{ old('codigo_seduca') }}">
          <span class="fa fa-key form-control-feedback"></span>
          @if ($errors->has('codigo_seduca'))
            <span class="help-block">*{{ $errors->first('codigo_seduca') }}</span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('turno') ? ' has-error' : '' }}">
          @if ($errors->has('turno'))
            <label class="control-label" for="turno"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <select name="turno" class="form-control select2" style="width: 100%;">
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>
            <option value="3">Noche</option>
          </select>
          @if ($errors->has('turno'))
            <span class="help-block">*{{ $errors->first('turno') }}</span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('telefonoc') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('telefonoc'))
            <label class="control-label" for="telefonoc"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <input type="text" class="form-control" placeholder="Telefono del colegio..." name="telefonoc" value="{{ old('telefonoc') }}">
          <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
          @if ($errors->has('telefonoc'))
            <span class="help-block">*{{ $errors->first('telefonoc') }}</span>
          @endif
        </div>

        <div class="form-group">
          <select name="tipo_colegio" class="form-control select2" style="width: 100%;">
            <option value="1">Publico</option>
            <option value="2">Privado</option>
            <option value="3">Convenio</option>
          </select>
        </div>

        <div class="form-group">
          <select name="departamento" class="form-control select2" style="width: 100%;">
            <option value="1">Beni</option>
            <option value="2">Chuquisaca</option>
            <option value="3">Cochabamba</option>
            <option value="4">Santa Cruz</option>
            <option value="5">La Paz</option>
            <option value="6">Oruro</option>
            <option value="7">Pando</option>
            <option value="8">Potosí</option>
            <option value="9">Tarija</option>
          </select>
        </div>

        <div class="form-group {{ $errors->has('ciudad') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('ciudad'))
            <label class="control-label" for="ciudad"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <input type="text" class="form-control" placeholder="Ciudad del colegio..." name="ciudad" value="{{ old('ciudad') }}">
          <span class="fa fa-map form-control-feedback"></span>
          @if ($errors->has('ciudad'))
            <span class="help-block">*{{ $errors->first('ciudad') }}</span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('ubicacion') ? ' has-error' : '' }} has-feedback">
          @if ($errors->has('ubicacion'))
            <label class="control-label" for="ubicacion"><i class="fa fa-times-circle-o"></i> Hubo un error...</label>
          @endif
          <input type="text" class="form-control" placeholder="Direccion del colegio..." name="ubicacion" value="{{ old('ubicacion') }}">
          <span class="fa fa-map-marker form-control-feedback"></span>
          @if ($errors->has('ubicacion'))
            <span class="help-block">*{{ $errors->first('ubicacion') }}</span>
          @endif
        </div>

        <div class="row">
          <div class="col-xs-8 col-md-8">
            <div class="checkbox {{ $errors->has('acepto') ? ' has-error' : '' }} icheck">
              <label>
                <input type="checkbox" name="acepto"> I agree to the <a href="#">terms</a>
              </label>
              @if ($errors->has('acepto'))
                <span class="help-block">*{{ $errors->first('acepto') }}</span>
              @endif
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-8 col-md-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <a href="{{url('/login')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div>
@endsection
