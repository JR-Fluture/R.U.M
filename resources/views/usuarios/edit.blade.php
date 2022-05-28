<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('Edit User')}}</h1>
        </div>

        <div class="container-lg bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($usuario, ['route' => ['usuarios.update',$usuario], 'method' => 'PUT', 'class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
            
                            @include('usuarios.partials.form')
                            <br>
                            {{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <h5><strong>{!! Form::label('password', __('Change Password').':') !!}</strong></h5>
                                {!! Form::text('password', '', ['class' => 'form-control','required'=>'required','placeholder' => __('Enter new password')]) !!}
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div> --}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <h5><strong>{!! Form::label('password', __('New Password').':') !!}</strong></h5>
                                {!! Form::password('password', ['class' => 'form-control','placeholder' => __('Enter new password')]) !!}
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                            <br>
                            <div class="form-group">
                                {!! Form::label('roles', __('Roles')) !!}
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox{{ $errors->has('roles[]') ? ' has-error' : '' }}">
                                        @foreach ($roles as $role)
                                            <label class="mr-4">
                                                {!! Form::checkbox('roles[]', $role->id, null) !!} 
                                                {{$role->name}}
                                            </label>
                                        @endforeach
                                        <small class="text-danger">{{ $errors->first('roles') }}</small>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="btn-group" style="text-align: center; display:block;">
                                {!! Form::submit(__('Update User'), ['class' => 'btn btn-success']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard>
</x-app-layout>