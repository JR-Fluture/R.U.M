<div class="form-group{{ $errors->has('tipo_linea') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tipo_linea', __('Name')) !!}</strong></h5>
    {!! Form::text('tipo_linea', null, ['class' => 'form-control','required'=>'required','placeholder' => __('Enter name')]) !!}
    <small class="text-danger">{{ $errors->first('tipo_linea') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('descripcion', __('Description')) !!}</strong></h5>
    {!! Form::textarea('descripcion', null, ['class' => 'form-control','required'=>'required']) !!}
    <small class="text-danger">{{ $errors->first('descripcion') }}</small>
</div>