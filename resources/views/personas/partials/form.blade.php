<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('name', __('Name').':') !!}</strong></h5>
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => __('Enter name')]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('dni', __('DNI').':') !!}</strong></h5>
    {!! Form::text('dni', null, ['class' => 'form-control','placeholder' => __('Enter dni')]) !!}
    <small class="text-danger">{{ $errors->first('dni') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('telefono_1') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('telefono_1', __('Phone').':') !!}</strong></h5>
    {!! Form::text('telefono_1', null, ['class' => 'form-control','placeholder' => __('Enter phone')]) !!}
    <small class="text-danger">{{ $errors->first('telefono_1') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('telefono_2') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('telefono_2', __('Phone').':') !!}</strong></h5>
    {!! Form::text('telefono_2', null, ['class' => 'form-control','placeholder' => __('Enter phone')]) !!}
    <small class="text-danger">{{ $errors->first('telefono_2') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('email', __('Email').':') !!}</strong></h5>
    {!! Form::text('email', null, ['class' => 'form-control','placeholder' => __('Enter email')]) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('departamento_id') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('departamento_id', __('Department')) !!}</strong></h5>
    {!! Form::select('departamento_id', $dpts, null, ['id' => 'departamento_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('departamento_id') }}</small>
</div>