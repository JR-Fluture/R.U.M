<div class="form-group{{ $errors->has('asunto') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('asunto', __('Business')) !!}</strong></h5>
    {!! Form::textarea('asunto', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('asunto') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('conclusion') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('conclusion', __('Conclusion')) !!}</strong></h5>
    {!! Form::textarea('conclusion', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('conclusion') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commentary')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('uso_terminal_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('uso_terminal_id', __('Use Terminal')) !!}</strong></h5>
    {!! Form::select('uso_terminal_id', $usos_terminales, null, ['id' => 'uso_terminal_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('uso_terminal_id') }}</small>
</div>