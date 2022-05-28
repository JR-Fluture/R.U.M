<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('Edit Mark Terminal')}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::model($marcas_terminale, ['route' => ['marcas-terminales.update',$marcas_terminale], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}                

                    @include('marcas-terminales.partials.form')
                    <br>
                    <div class="btn-group" style="text-align: center; display:block;">
                        {!! Form::submit(__('Update Mark Terminal'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
            
    </x-dashboard>
</x-app-layout>
