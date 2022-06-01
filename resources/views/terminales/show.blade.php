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
                                {!! Form::model($terminale, ['class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
                                    @include('terminales.partials.form')
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('created_at', __('Creation date')) !!}</strong></h5>
                                        {!! Form::date('created_at', $terminale->created_at, ['class' => 'form-control']) !!}
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('updated_at', __('Edition date')) !!}</strong></h5>
                                        {!! Form::date('updated_at', $terminale->updated_at, ['class' => 'form-control']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside style="border:1px solid black; border-radius: 25px;" class=" shadow">
                <div class="m-3">
                    <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('Model Terminal')}}</h1>
                    <ul style="padding-left: 0px;" class="w-full">
                        <li class="mb-4">
                            <a href="{{route('modelos-terminales.show',$terminale->modelo_terminal)}}">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="card-text ml-2 text-gray-600">
                                            {{__('Mark')}}: {{$terminale->modelo_terminal->marca_terminal->name}}
                                            <br>
                                            {{__('Model')}}: {{$terminale->modelo_terminal->modelo}}
                                            <br>
                                            {{__('S.O')}}: {{$terminale->modelo_terminal->sistema_operativo}}
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
        $('#modelo_terminal_id').attr('disabled','disabled');
    </script>
</x-app-layout>
