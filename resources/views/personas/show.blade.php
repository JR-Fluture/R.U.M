<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="lg:col-span-2">            
                <div>
                    <h1 class="text-center text-4xl font-bold">{{__('Show data').' - '.$persona->name}}</h1>
                </div>
                <div class="container-lg bg-white shadow-md overflow-auto p-3">
                    <div>
                        <div class="card">
                            <div class="card-body">
                                {!! Form::model($persona, ['class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
                                    @include('personas.partials.form')
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('created_at', __('Creation date')) !!}</strong></h5>
                                        {!! Form::date('created_at', $persona->created_at, ['class' => 'form-control']) !!}
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('updated_at', __('Edition date')) !!}</strong></h5>
                                        {!! Form::date('updated_at', $persona->updated_at, ['class' => 'form-control']) !!}
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
                    <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('More in').' '.$persona->departamento->name}}</h1>
                    
                    <ul style="padding-left: 0px;" class="w-full">
                        @foreach ($dpts2 as $dpt)
                            <li class="mb-4">
                                <a href="{{route('personas.show',$dpt)}}">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="ml-2 text-gray-600">{{$dpt->name}}</span></h5>
                                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                            <p class="card-text ml-2 text-gray-600">  
                                                Tel: {{$dpt->telefono_1}}
                                                <br>
                                                {{__('Email')}}: {{$dpt->email}}
                                            </p>
                                        </div>
                                    </div>
                                    
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
            
        </div>
    </div>
    <script>
        const inputs = document.querySelectorAll('input');
        inputs.forEach(element => {
            element.setAttribute('disabled', 'disabled');
            document.getElementById('departamento_id').setAttribute('disabled', 'disabled');
        });
        console.log(inputs);
    </script>
</x-app-layout>
