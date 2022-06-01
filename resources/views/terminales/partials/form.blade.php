<div class="form-group{{ $errors->has('modelo_terminal_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('modelo_terminal_id', __('Model Terminal')) !!}</strong></h5>
    {!! Form::select('modelo_terminal_id', $modelos, null, ['id' => 'modelo_terminal_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('modelo_terminal_id') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('imei_1') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('imei_1', __('1º IMEI').':') !!}</strong></h5>
    {!! Form::text('imei_1', null, ['class' => 'form-control','placeholder' => __('Enter IMEI')]) !!}
    <small class="text-danger">{{ $errors->first('imei_1') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('imei_2') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('imei_2', __('2º IMEI').':') !!}</strong></h5>
    {!! Form::text('imei_2', null, ['class' => 'form-control','placeholder' => __('Enter IMEI')]) !!}
    <small class="text-danger">{{ $errors->first('imei_2') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('numero_serie') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('numero_serie', __('NºSerie').':') !!}</strong></h5>
    {!! Form::text('numero_serie', null, ['class' => 'form-control','placeholder' => __('Enter serial number')]) !!}
    <small class="text-danger">{{ $errors->first('numero_serie') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commentary')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>