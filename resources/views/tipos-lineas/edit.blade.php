<x-app-layout>
    <x-dashboard>
        <div class="py-8">
            <h1 class=" text-center">{{__('Edit Type Line')}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::model($tipos_linea, ['route' => ['tipos-lineas.update',$tipos_linea], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}                

                    @include('tipos-lineas.partials.form')
                    <br>
                    <div class="btn-group" style="text-align: center; display:block;">
                        {!! Form::submit(__('Update Type Line'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
            
    </x-dashboard>
</x-app-layout>
