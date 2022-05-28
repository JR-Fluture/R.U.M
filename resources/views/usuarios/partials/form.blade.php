<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('name', __('Name').':') !!}</strong></h5>
    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required','placeholder' => __('Enter name')]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('email', __('Email').':') !!}</strong></h5>
    {!! Form::text('email', null, ['class' => 'form-control','required'=>'required','placeholder' => __('Enter email')]) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>
