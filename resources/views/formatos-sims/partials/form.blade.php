<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('name', __('Name')) !!}</strong></h5>
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => __('Enter name'),'required'=>'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>