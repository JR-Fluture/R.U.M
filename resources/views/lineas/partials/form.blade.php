<div class="form-group{{ $errors->has('numero_movil') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('numero_movil', __('Cellphone Number').':') !!}</strong></h5>
    {!! Form::text('numero_movil', null, ['class' => 'form-control','placeholder' => __('Enter phone')]) !!}
    <small class="text-danger">{{ $errors->first('numero_movil') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('numero_interno') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('numero_interno', __('Internal Number').':') !!}</strong></h5>
    {!! Form::text('numero_interno', null, ['class' => 'form-control','placeholder' => __('Enter phone')]) !!}
    <small class="text-danger">{{ $errors->first('numero_interno') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('numero_fijo') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('numero_fijo', __('Fixed Number').':') !!}</strong></h5>
    {!! Form::text('numero_fijo', null, ['class' => 'form-control','placeholder' => __('Enter phone')]) !!}
    <small class="text-danger">{{ $errors->first('numero_fijo') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commentary')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('contrato_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('contrato_id', __('Contract')) !!}</strong></h5>
    {!! Form::select('contrato_id', $contratos, null, ['id' => 'contrato_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('contrato_id') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('tipo_linea_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('tipo_linea_id', __('Type Line')) !!}</strong></h5>
    {!! Form::select('tipo_linea_id', $tipos_linea, null, ['id' => 'tipo_linea_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('tipo_linea_id') }}</small>
</div>