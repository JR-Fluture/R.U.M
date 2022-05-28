<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('name', __('Name')) !!}</strong></h5>
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => __('Enter name'),'required'=>'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comercial') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comercial', __('Commercial')) !!}</strong></h5>
    {!! Form::text('comercial', null, ['class' => 'form-control','placeholder' => __('Enter comercial')]) !!}
    <small class="text-danger">{{ $errors->first('comercial') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('telefono_comercial') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('telefono_comercial', __('Business Phone')) !!}</strong></h5>
    {!! Form::text('telefono_comercial', null, ['class' => 'form-control','placeholder' => __('Enter telefono comercial')]) !!}
    <small class="text-danger">{{ $errors->first('telefono_comercial') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('telefono_gestion') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('telefono_gestion', __('Phone Management')) !!}</strong></h5>
    {!! Form::text('telefono_gestion', null, ['class' => 'form-control','placeholder' => __('Enter telefono gestion')]) !!}
    <small class="text-danger">{{ $errors->first('telefono_gestion') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('telefono_incidencia') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('telefono_incidencia', __('Incident Phone')) !!}</strong></h5>
    {!! Form::text('telefono_incidencia', null, ['class' => 'form-control','placeholder' => __('Enter telefono incidencia')]) !!}
    <small class="text-danger">{{ $errors->first('telefono_incidencia') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('claves') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('claves', __('Claves')) !!}</strong></h5>
    {!! Form::text('claves', null, ['class' => 'form-control','placeholder' => __('Enter claves')]) !!}
    <small class="text-danger">{{ $errors->first('claves') }}</small>
</div>
<br>
<div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('comentarios', __('Commets')) !!}</strong></h5>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('comentarios') }}</small>
</div>
