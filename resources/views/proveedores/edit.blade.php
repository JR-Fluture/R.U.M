<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('Edit Supplier')}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::model($proveedore, ['route' => ['proveedores.update',$proveedore], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}                

                    @include('proveedores.partials.form')
                    <br>
                    <div class="btn-group" style="text-align: center; display:block;">
                        {!! Form::submit(__('Update Supplier'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
            
    </x-dashboard>
</x-app-layout>
