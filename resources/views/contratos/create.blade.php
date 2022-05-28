<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('Create Contract')}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'contratos.store', 'class' => 'form-horizontal']) !!}                

                    @include('contratos.partials.form')
                    <br>
                    <div class="btn-group" style="text-align: center; display:block;">
                        {!! Form::submit(__('Create Contract'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </x-dashboard>
</x-app-layout>