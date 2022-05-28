<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('Create Supplier')}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'proveedores.store', 'class' => 'form-horizontal']) !!}                

                    @include('proveedores.partials.form')
                    <br>
                    <div class="btn-group" style="text-align: center; display:block;">
                        {!! Form::submit(__('Create Supplier'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </x-dashboard>
</x-app-layout>