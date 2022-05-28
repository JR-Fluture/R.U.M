<div class="form-group{{ $errors->has('cod') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('cod', __('Cod').':') !!}</strong></h5>
    {!! Form::text('cod', null, ['class' => 'form-control','required'=>'required','placeholder' => __('Enter cod')]) !!}
    <small class="text-danger">{{ $errors->first('cod') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('name', __('Name').':') !!}</strong></h5>
    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required','placeholder' => __('Enter name')]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>