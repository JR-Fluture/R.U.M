<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="lg:col-span-2">            
                <div>
                    <h1 class="text-center text-4xl font-bold">{{__('Show data')}}</h1>
                </div>
                <div class="container-lg bg-white shadow-md overflow-auto p-3">
                    <div>
                        <div class="card">
                            <div class="card-body">
                                {!! Form::model($incidencias_terminale, ['class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
                                    @include('incidencias-terminales.partials.form')
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('created_at', __('Creation date')) !!}</strong></h5>
                                        {!! Form::date('created_at', $incidencias_terminale->created_at, ['class' => 'form-control']) !!}
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('updated_at', __('Edition date')) !!}</strong></h5>
                                        {!! Form::date('updated_at', $incidencias_terminale->updated_at, ['class' => 'form-control']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Contenido relacionado --}}
            <aside style="border:1px solid black; border-radius: 25px;" class=" shadow">
                <div class="m-3">
                    <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('Use Terminal')}}</h1>
                    
                    <ul style="padding-left: 0px;" class="w-full">
                        <li class="mb-4">
                            <a href="{{route('usos-terminales.show',$incidencias_terminale->uso_terminal_id)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title"><span class="ml-2 text-gray-600">{{__('Use Terminal').' ID: '.$incidencias_terminale->uso_terminal_id}}</span></h5>
                                        
                                    </div>
                                </div>
                                
                            </a>
                            <div class="m-3">
                                <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('Terminal')}}</h1>
                                <ul style="padding-left: 0px;" class="w-full">
                                    <li class="mb-4">
                                        <a href="{{route('terminales.show',$incidencias_terminale->uso_terminal->terminal)}}">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <p class="card-text ml-2 text-gray-600">
                                                        {{__('Terminal')}}: {{$incidencias_terminale->uso_terminal->terminal->modelo_terminal->marca_terminal->name.' '.$incidencias_terminale->uso_terminal->terminal->modelo_terminal->modelo.' '.$incidencias_terminale->uso_terminal->terminal->modelo_terminal->sistema_operativo}}
                                                        <br>
                                                        {{__('NºSerie')}}: {{$incidencias_terminale->uso_terminal->terminal->numero_serie}}
                                                        <br>
                                                        {{__('IMEI 1')}}: {{$incidencias_terminale->uso_terminal->terminal->imei_1}}
                                                        <br>
                                                        {{__('IMEI 2')}}: {{$incidencias_terminale->uso_terminal->terminal->imei_2}}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="m-3">
                                <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('Persona')}}</h1>
                                <ul style="padding-left: 0px;" class="w-full">
                                    <li class="mb-4">
                                        <a href="{{route('personas.show',$incidencias_terminale->uso_terminal->persona)}}">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <h5 class="card-title"><span class="ml-2 text-gray-600">{{$incidencias_terminale->uso_terminal->persona->name}}</span></h5>
                                                    <p class="card-text ml-2 text-gray-600">  
                                                        Tel: {{$incidencias_terminale->uso_terminal->persona->telefono_1}}
                                                        <br>
                                                        {{__('Email')}}: {{$incidencias_terminale->uso_terminal->persona->email}}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="m-3">
                                <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('SIM')}}</h1>
                                <ul style="padding-left: 0px;" class="w-full">
                                    <li class="mb-4">
                                        <a href="{{route('sims.show',$incidencias_terminale->uso_terminal->sim)}}">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <p class="card-text ml-2 text-gray-600">  
                                                        {{__('Nº SIM')}}: {{$incidencias_terminale->uso_terminal->sim->numero_sim}}
                                                        <br>
                                                        {{__('Pin')}}: {{$incidencias_terminale->uso_terminal->sim->pin}}
                                                        <br>
                                                        {{__('Phone')}}: {{$incidencias_terminale->uso_terminal->sim->linea->numero_movil}}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
            
        </div>
    </div>
    
    <script>
        const inputs = document.querySelectorAll('input');
        inputs.forEach(element => {
            element.setAttribute('disabled', 'disabled');
        });
        $('#asunto').attr('disabled','disabled');
        $('#conclusion').attr('disabled','disabled');
        $('#comentarios').attr('disabled','disabled');
        $('#uso_terminal_id').attr('disabled','disabled');
    </script>
</x-app-layout>
