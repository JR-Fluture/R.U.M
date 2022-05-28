<div class="form-group{{ $errors->has('IDCONTACTO') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('IDCONTACTO', __('ID Contact').':') !!}</strong></h5>
    {!! Form::text('IDCONTACTO', null, ['class' => 'form-control','placeholder' => __('Enter ID Contact')]) !!}
    <small class="text-danger">{{ $errors->first('IDCONTACTO') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('proveedor_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('proveedor_id', __('Supplier')) !!}</strong></h5>
    {!! Form::select('proveedor_id', $proveedores, null, ['id' => 'proveedor_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('proveedor_id') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('descripcion', __('Description')) !!}</strong></h5>
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('descripcion') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Comments')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>