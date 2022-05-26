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
                                {!! Form::model($usopc, ['class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
                                    @include('usopcs.partials.form')
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('created_at', __('Creation date')) !!}</strong></h5>
                                        {!! Form::date('created_at', $usopc->created_at, ['class' => 'form-control']) !!}
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('updated_at', __('Edition date')) !!}</strong></h5>
                                        {!! Form::date('updated_at', $usopc->updated_at, ['class' => 'form-control']) !!}
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
                    <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('PC')}}</h1>
                    <ul style="padding-left: 0px;" class="w-full">
                        <li class="mb-4">
                            <a href="{{route('pcs.show',$usopc->pc)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="card-text ml-2 text-gray-600">
                                            {{__('Micro Procesador')}}: {{$usopc->pc->microprocesador}}
                                            <br>
                                            {{__('MotherBoard')}}: {{$usopc->pc->placa_base}}
                                            <br>
                                            {{__('S.O')}}: {{$usopc->pc->sistema_operativo}}
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
                            <a href="{{route('personas.show',$usopc->persona)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title"><span class="ml-2 text-gray-600">{{$usopc->persona->name}}</span></h5>
                                        <p class="card-text ml-2 text-gray-600">  
                                            Tel: {{$usopc->persona->telefono_1}}
                                            <br>
                                            {{__('Email')}}: {{$usopc->persona->email}}
                                        </p>
                                    </div>
                                </div>
                                
                            </a>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="m-3">
                    <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('Monitor')}}</h1>
                    <ul style="padding-left: 0px;" class="w-full">
                        <li class="mb-4">
                            <a href="{{route('monitores.show',$usopc->monitor)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="card-text ml-2 text-gray-600">  
                                            {{__('Marca')}}: {{$usopc->monitor->marca}}
                                            <br>
                                            {{__('Model')}}: {{$usopc->monitor->modelo}}
                                            <br>
                                            {{__('NºSerie')}}: {{$usopc->monitor->numero_serie}}
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
        $('#pc_id').attr('disabled','disabled');
        $('#persona_id').attr('disabled','disabled');
        $('#monitor_id').attr('disabled','disabled');
    </script>
</x-app-layout>
