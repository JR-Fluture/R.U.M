<div class="form-group{{ $errors->has('marca') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('marca', __('Marca').':') !!}</strong></h5>
    {!! Form::text('marca', null, ['class' => 'form-control','placeholder' => __('Enter marca')]) !!}
    <small class="text-danger">{{ $errors->first('marca') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('modelo', __('Model').':') !!}</strong></h5>
    {!! Form::text('modelo', null, ['class' => 'form-control','placeholder' => __('Enter modelo')]) !!}
    <small class="text-danger">{{ $errors->first('modelo') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('tinta_original') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tinta_original', __('Nombre tinta original').':') !!}</strong></h5>
    {!! Form::text('tinta_original', null, ['class' => 'form-control','placeholder' => __('Enter nombre tinta original')]) !!}
    <small class="text-danger">{{ $errors->first('tinta_original') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('tinta_alternativo') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tinta_alternativo', __('Nombre tinta alternativo').':') !!}</strong></h5>
    {!! Form::text('tinta_alternativo', null, ['class' => 'form-control','placeholder' => __('Enter nombre tinta alternativo')]) !!}
    <small class="text-danger">{{ $errors->first('tinta_alternativo') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('es_wifi') ? ' has-error' : '' }}">
        <label for="es_wifi">
            <h5><strong>{!! Form::checkbox('es_wifi', '1', null, ['id' => 'es_wifi']) !!} {{__('WiFi')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('es_wifi') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('red') ? ' has-error' : '' }}">
        <label for="red">
            <h5><strong>{!! Form::checkbox('red', '1', null, ['id' => 'red']) !!} {{__('Cable de red')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('red') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('color') ? ' has-error' : '' }}">
        <label for="color">
            <h5><strong>{!! Form::checkbox('color', '1', null, ['id' => 'color']) !!} {{__('Color')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('color') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('es_multifuncion') ? ' has-error' : '' }}">
        <label for="es_multifuncion">
            <h5><strong>{!! Form::checkbox('es_multifuncion', '1', null, ['id' => 'es_multifuncion']) !!} {{__('Es multifuncion')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('es_multifuncion') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('numero_serie') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('numero_serie', __('Numero de serie').':') !!}</strong></h5>
    {!! Form::text('numero_serie', null, ['class' => 'form-control','placeholder' => __('Enter numero de serie')]) !!}
    <small class="text-danger">{{ $errors->first('numero_serie') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commentary')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>