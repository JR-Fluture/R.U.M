<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('Create Departament')}}</h1>
        </div>

        <div class="container-lg bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'departamentos.store', 'autocomplete'=>'off', 'files'=>true]) !!}                
            
                            @include('departamentos.partials.form')
                            <br>
                            <div class="btn-group" style="text-align: center; display:block;">
                                {!! Form::submit(__('Create Departament'), ['class' => 'btn btn-success']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard>
</x-app-layout>