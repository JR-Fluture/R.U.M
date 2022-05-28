<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('Edit Type Charger')}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::model($tipos_cargadore, ['route' => ['tipos-cargadores.update',$tipos_cargadore], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}                

                    @include('tipos-cargadores.partials.form')
                    <br>
                    <div class="btn-group" style="text-align: center; display:block;">
                        {!! Form::submit(__('Update Type Charger'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
            
    </x-dashboard>
</x-app-layout>
