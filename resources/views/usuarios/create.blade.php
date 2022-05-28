<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('New User')}}</h1>
        </div>

        <div class="container-lg bg-white shadow-md overflow-auto p-3">
            <div class="card">
                <div class="card-body">

                    <x-jet-validation-errors class="mb-4" />
            
                    <form method="POST" action="{{ route('usuarios.store') }}">
                        @csrf
            
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
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
                            {!! Form::submit(__('Create User'), ['class' => 'btn btn-success']) !!}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-dashboard>
    

    
</x-app-layout>