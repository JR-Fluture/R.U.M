<div class="form-group{{ $errors->has('terminal_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('terminal_id', __('Terminal')) !!}</strong></h5>
    {!! Form::select('terminal_id', $terminales, null, ['id' => 'terminal_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('terminal_id') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('persona_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('persona_id', __('Persona')) !!}</strong></h5>
    {!! Form::select('persona_id', $personas, null, ['id' => 'persona_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('persona_id') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('sim_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('sim_id', __('SIM')) !!}</strong></h5>
    {!! Form::select('sim_id', $sims, null, ['id' => 'sim_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('sim_id') }}</small>
</div>
<br>
<div class="form-group">
    <div class="checkbox{{ $errors->has('en_uso') ? ' has-error' : '' }}">
        <label for="en_uso">
            <h5><strong>{!! Form::checkbox('en_uso', '1', null, ['id' => 'en_uso']) !!} {{__('In use')}}</strong></h5>
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('en_uso') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('fin_uso') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('fin_uso', __('End of use date')) !!}</strong></h5>
    {!! Form::date('fin_uso', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('fin_uso') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commentary')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>