<div class="form-group{{ $errors->has('microprocesador') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('microprocesador', __('MicroProcesador').':') !!}</strong></h5>
    {!! Form::text('microprocesador', null, ['class' => 'form-control','placeholder' => __('Enter microprocesador')]) !!}
    <small class="text-danger">{{ $errors->first('microprocesador') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('placa_base') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('placa_base', __('Placa Base').':') !!}</strong></h5>
    {!! Form::text('placa_base', null, ['class' => 'form-control','placeholder' => __('Enter placa base')]) !!}
    <small class="text-danger">{{ $errors->first('placa_base') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('tipo_ram') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tipo_ram', __('Tipo RAM').':') !!}</strong></h5>
    {!! Form::text('tipo_ram', null, ['class' => 'form-control','placeholder' => __('Enter tipo ram')]) !!}
    <small class="text-danger">{{ $errors->first('tipo_ram') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('ram') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('ram', 'GB RAM') !!}</strong></h5>
    {!! Form::number('ram', null, ['class' => 'form-control','placeholder' => __('Enter GB ram')]) !!}
    <small class="text-danger">{{ $errors->first('ram') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('tipo_almacenamiento') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tipo_almacenamiento', __('Tipo Almacenamiento').':') !!}</strong></h5>
    {!! Form::text('tipo_almacenamiento', null, ['class' => 'form-control','placeholder' => __('Enter tipo almacenamiento')]) !!}
    <small class="text-danger">{{ $errors->first('tipo_almacenamiento') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('capacidad_almacenamiento') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('capacidad_almacenamiento', 'GB Almacenamiento') !!}</strong></h5>
    {!! Form::number('capacidad_almacenamiento', null, ['class' => 'form-control','placeholder' => __('Enter GB almacenamiento')]) !!}
    <small class="text-danger">{{ $errors->first('capacidad_almacenamiento') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('tipos_conector') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tipos_conector', __('Conectores').':') !!}</strong></h5>
    {!! Form::text('tipos_conector', null, ['class' => 'form-control','placeholder' => __('Enter conectores')]) !!}
    <small class="text-danger">{{ $errors->first('tipos_conector') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('sistema_operativo') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('sistema_operativo', __('Sistema Operativo').':') !!}</strong></h5>
    {!! Form::text('sistema_operativo', null, ['class' => 'form-control','placeholder' => __('Enter sistema operativo')]) !!}
    <small class="text-danger">{{ $errors->first('sistema_operativo') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('activacion') ? ' has-error' : '' }}">
        <label for="activacion">
            <h5><strong>{!! Form::checkbox('activacion', '1', null, ['id' => 'activacion']) !!} {{__('Activado')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('activacion') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('numero_inventario') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('numero_inventario', __('Numero de inventario').':') !!}</strong></h5>
    {!! Form::text('numero_inventario', null, ['class' => 'form-control','placeholder' => __('Enter numero de inventario')]) !!}
    <small class="text-danger">{{ $errors->first('numero_inventario') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commentary')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>

