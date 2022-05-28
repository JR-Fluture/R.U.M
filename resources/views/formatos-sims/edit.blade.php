<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('Edit Format SIM')}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::model($formatos_sim, ['route' => ['formatos-sims.update',$formatos_sim], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}                

                    @include('formatos-sims.partials.form')
                    <br>
                    <div class="btn-group" style="text-align: center; display:block;">
                        {!! Form::submit(__('Update Format SIM'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
            
    </x-dashboard>
</x-app-layout>
