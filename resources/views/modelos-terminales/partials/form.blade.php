<div class="form-group{{ $errors->has('tipo_terminal_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tipo_terminal_id', __('Type Terminal')) !!}</strong></h5>
    {!! Form::select('tipo_terminal_id', $tipos_terminales, null, ['id' => 'tipo_terminal_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('tipo_terminal_id') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('marca_terminal_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('marca_terminal_id', __('Mark Terminal')) !!}</strong></h5>
    {!! Form::select('marca_terminal_id', $marcas_terminales, null, ['id' => 'marca_terminal_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('marca_terminal_id') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('modelo', __('Model').':') !!}</strong></h5>
    {!! Form::text('modelo', null, ['class' => 'form-control','placeholder' => __('Enter model')]) !!}
    <small class="text-danger">{{ $errors->first('modelo') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('sistema_operativo') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('sistema_operativo', __('S.O.').':') !!}</strong></h5>
    {!! Form::text('sistema_operativo', null, ['class' => 'form-control','placeholder' => __('Enter sistema operativo')]) !!}
    <small class="text-danger">{{ $errors->first('sistema_operativo') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('version_sistema_operativo') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('version_sistema_operativo', __('Version S.O.').':') !!}</strong></h5>
    {!! Form::text('version_sistema_operativo', null, ['class' => 'form-control','placeholder' => __('Enter version sistema operativo')]) !!}
    <small class="text-danger">{{ $errors->first('version_sistema_operativo') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('es_doble_sim') ? ' has-error' : '' }}">
        <label for="es_doble_sim">
            <h5><strong>{!! Form::checkbox('es_doble_sim', '1', null, ['id' => 'es_doble_sim']) !!} {{__('It Is Dual SIM')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('es_doble_sim') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('ram') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('ram', __('RAM')) !!}</strong></h5>
    {!! Form::number('ram', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('ram') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('almacenamiento_interno') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('almacenamiento_interno', __('Internal Storage')) !!}</strong></h5>
    {!! Form::number('almacenamiento_interno', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('almacenamiento_interno') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('tiene_almacenamiento_externo') ? ' has-error' : '' }}">
        <label for="tiene_almacenamiento_externo">
            <h5><strong>{!! Form::checkbox('tiene_almacenamiento_externo', '1', null, ['id' => 'tiene_almacenamiento_externo']) !!} {{__('Has External Storage')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('tiene_almacenamiento_externo') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('almacenamiento_externo') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('almacenamiento_externo', __('External Storage')) !!}</strong></h5>
    {!! Form::number('almacenamiento_externo', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('almacenamiento_externo') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('px_camara_trasera') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('px_camara_trasera', __('Px Rear Camera')) !!}</strong></h5>
    {!! Form::number('px_camara_trasera', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('px_camara_trasera') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('px_camara_frontal') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('px_camara_frontal', __('Px Front Camera')) !!}</strong></h5>
    {!! Form::number('px_camara_frontal', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('px_camara_frontal') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('num_puertos_rj_45') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('num_puertos_rj_45', __('Num Ports rj45')) !!}</strong></h5>
    {!! Form::number('num_puertos_rj_45', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('num_puertos_rj_45') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('tiene_wifi') ? ' has-error' : '' }}">
        <label for="tiene_wifi">
            <h5><strong>{!! Form::checkbox('tiene_wifi', '1', null, ['id' => 'tiene_wifi']) !!} {{__('Has WiFi')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('tiene_wifi') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('es_punto_acceso') ? ' has-error' : '' }}">
        <label for="es_punto_acceso">
            <h5><strong>{!! Form::checkbox('es_punto_acceso', '1', null, ['id' => 'es_punto_acceso']) !!} {{__('It Is Access Point')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('es_punto_acceso') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commentary')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('tipo_cargador_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tipo_cargador_id', __('Type Charger')) !!}</strong></h5>
    {!! Form::select('tipo_cargador_id', $tipos_cargadores, null, ['id' => 'tipo_cargador_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('tipo_cargador_id') }}</small>
</div>