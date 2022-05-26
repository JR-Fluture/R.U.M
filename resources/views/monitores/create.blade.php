<x-app-layout>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>        
    @endif
    <div class="py-8">
        <h1 class=" text-center">{{__('Create Monitor')}}</h1>
    </div>

    <div class="container-lg bg-white shadow-md overflow-auto p-3">
        <div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'monitores.store', 'autocomplete'=>'off', 'files'=>true]) !!}                
        
                        @include('monitores.partials.form')
                        <br>
                        <div class="btn-group" style="text-align: center; display:block;">
                            {!! Form::submit(__('Create Monitor'), ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>