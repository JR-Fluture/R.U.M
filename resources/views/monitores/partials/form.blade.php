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
<div class="form-group{{ $errors->has('pulgadas') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('pulgadas', 'Pulgadas') !!}</strong></h5>
    {!! Form::number('pulgadas', null, ['class' => 'form-control','placeholder' => __('Enter pulgadas')]) !!}
    <small class="text-danger">{{ $errors->first('pulgadas') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('conectores') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('conectores', __('Conectores').':') !!}</strong></h5>
    {!! Form::text('conectores', null, ['class' => 'form-control','placeholder' => __('Enter conectores')]) !!}
    <small class="text-danger">{{ $errors->first('conectores') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('tiene_altavoces') ? ' has-error' : '' }}">
        <label for="tiene_altavoces">
            <h5><strong>{!! Form::checkbox('tiene_altavoces', '1', null, ['id' => 'tiene_altavoces']) !!} {{__('Tiene altavoces')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('tiene_altavoces') }}</small>
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