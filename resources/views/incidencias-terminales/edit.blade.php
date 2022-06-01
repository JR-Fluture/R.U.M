<x-app-layout>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>        
    @endif
    <div class="py-8">
        <h1 class=" text-center">{{__('Edit Terminal Incident')}}</h1>
    </div>

    <div class="container-lg bg-white shadow-md overflow-auto p-3">
        <div>
            <div class="card">
                <div class="card-body">
                    {!! Form::model($incidencias_terminale, ['route' => ['incidencias-terminales.update',$incidencias_terminale], 'method' => 'PUT', 'class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
        
                        @include('incidencias-terminales.partials.form')
                        <br>
                        <div class="btn-group" style="text-align: center; display:block;">
                            {!! Form::submit(__('Update Terminal Incident'), ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>
        $("select").find("option[value='0']").remove();
    </script>
</x-app-layout>