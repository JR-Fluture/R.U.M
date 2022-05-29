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
                                {!! Form::model($sim, ['class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
                                    @include('sims.partials.form')
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('created_at', __('Creation date')) !!}</strong></h5>
                                        {!! Form::date('created_at', $sim->created_at, ['class' => 'form-control']) !!}
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('updated_at', __('Edition date')) !!}</strong></h5>
                                        {!! Form::date('updated_at', $sim->updated_at, ['class' => 'form-control']) !!}
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
                    <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('More in')}}</h1>
                    
                    <ul style="padding-left: 0px;" class="w-full">
                        <li class="mb-4">
                            <a href="{{route('lineas.show',$sim->linea)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="card-text ml-2 text-gray-600">  
                                            {{__('Cellphone Number').': '.$sim->linea->numero_movil}}
                                            <br>
                                            {{__('Internal Number').': '.$sim->linea->numero_interno}}
                                            <br>
                                            {{__('Fixed Number').': '.$sim->linea->numero_fijo}}
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
        $('#descripcion').attr('disabled','disabled');
        $('#formato_sim_id').attr('disabled','disabled');
        $('#linea_id').attr('disabled','disabled');
    </script>
</x-app-layout>
