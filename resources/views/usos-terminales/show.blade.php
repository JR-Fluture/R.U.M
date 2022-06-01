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
                                {!! Form::model($usos_terminale, ['class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
                                    @include('usos-terminales.partials.form')
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('created_at', __('Creation date')) !!}</strong></h5>
                                        {!! Form::date('created_at', $usos_terminale->created_at, ['class' => 'form-control']) !!}
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('updated_at', __('Edition date')) !!}</strong></h5>
                                        {!! Form::date('updated_at', $usos_terminale->updated_at, ['class' => 'form-control']) !!}
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
                    <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('Terminal')}}</h1>
                    <ul style="padding-left: 0px;" class="w-full">
                        <li class="mb-4">
                            <a href="{{route('terminales.show',$usos_terminale->terminal)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="card-text ml-2 text-gray-600">
                                            {{__('Terminal')}}: {{$usos_terminale->terminal->modelo_terminal->marca_terminal->name.' '.$usos_terminale->terminal->modelo_terminal->modelo.' '.$usos_terminale->terminal->modelo_terminal->sistema_operativo}}
                                            <br>
                                            {{__('NºSerie')}}: {{$usos_terminale->terminal->numero_serie}}
                                            <br>
                                            {{__('IMEI 1')}}: {{$usos_terminale->terminal->imei_1}}
                                            <br>
                                            {{__('IMEI 2')}}: {{$usos_terminale->terminal->imei_2}}
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
                            <a href="{{route('personas.show',$usos_terminale->persona)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title"><span class="ml-2 text-gray-600">{{$usos_terminale->persona->name}}</span></h5>
                                        <p class="card-text ml-2 text-gray-600">  
                                            Tel: {{$usos_terminale->persona->telefono_1}}
                                            <br>
                                            {{__('Email')}}: {{$usos_terminale->persona->email}}
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
                            <a href="{{route('sims.show',$usos_terminale->sim)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="card-text ml-2 text-gray-600">  
                                            {{__('Nº SIM')}}: {{$usos_terminale->sim->numero_sim}}
                                            <br>
                                            {{__('Pin')}}: {{$usos_terminale->sim->pin}}
                                            <br>
                                            {{__('Phone')}}: {{$usos_terminale->sim->linea->numero_movil}}
                                        </p>
                                    </div>
                                </div>
                                
                            </a>
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
        $('#comentarios').attr('disabled','disabled');
        $('#terminal_id').attr('disabled','disabled');
        $('#persona_id').attr('disabled','disabled');
        $('#sim_id').attr('disabled','disabled');
    </script>
</x-app-layout>
