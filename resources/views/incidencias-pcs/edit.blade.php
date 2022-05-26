<x-app-layout>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>        
    @endif
    <div class="py-8">
        <h1 class=" text-center">{{__('Edit Pc Incident')}}</h1>
    </div>

    <div class="container-lg bg-white shadow-md overflow-auto p-3">
        <div>
            <div class="card">
                <div class="card-body">
                    {!! Form::model($incidencias_pc, ['route' => ['incidencias-pcs.update',$incidencias_pc], 'method' => 'PUT', 'class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
        
                        @include('incidencias-pcs.partials.form')
                        <br>
                        <div class="btn-group" style="text-align: center; display:block;">
                            {!! Form::submit(__('Update Pc Incident'), ['class' => 'btn btn-success']) !!}
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