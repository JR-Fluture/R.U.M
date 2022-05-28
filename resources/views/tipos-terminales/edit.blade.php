<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('Edit Type Terminal')}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::model($tipos_terminale, ['route' => ['tipos-terminales.update',$tipos_terminale], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}                

                    @include('tipos-terminales.partials.form')
                    <br>
                    <div class="btn-group" style="text-align: center; display:block;">
                        {!! Form::submit(__('Update Type Terminal'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
            
    </x-dashboard>
</x-app-layout>
