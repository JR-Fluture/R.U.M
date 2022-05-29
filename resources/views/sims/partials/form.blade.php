<div class="form-group{{ $errors->has('numero_sim') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('numero_sim', __('Number SIM').':') !!}</strong></h5>
    {!! Form::text('numero_sim', null, ['class' => 'form-control','placeholder' => __('Enter number sim')]) !!}
    <small class="text-danger">{{ $errors->first('numero_sim') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('pin', __('PIN').':') !!}</strong></h5>
    {!! Form::text('pin', null, ['class' => 'form-control','placeholder' => __('Enter pin')]) !!}
    <small class="text-danger">{{ $errors->first('pin') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('puk') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('puk', __('PUK').':') !!}</strong></h5>
    {!! Form::text('puk', null, ['class' => 'form-control','placeholder' => __('Enter puk')]) !!}
    <small class="text-danger">{{ $errors->first('puk') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commentary')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('formato_sim_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('formato_sim_id', __('Format SIM')) !!}</strong></h5>
    {!! Form::select('formato_sim_id', $formato_sim, null, ['id' => 'formato_sim_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('formato_sim_id') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('linea_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('linea_id', __('Line')) !!}</strong></h5>
    {!! Form::select('linea_id', $linea, null, ['id' => 'linea_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('linea_id') }}</small>
</div>