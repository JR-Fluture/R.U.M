<x-app-layout>
    <div class="container py-8"> 
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="lg:col-span-2">           
                <div>
                    <h1 class="text-center text-4xl font-bold">{{__('Show data').' - '.$impresora->name}}</h1>
                </div>
                <div class="container-lg bg-white shadow-md overflow-auto p-3">
                    <div>
                        <div class="card">
                            <div class="card-body">
                                {!! Form::model($impresora, ['class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
                                    @include('impresoras.partials.form')
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('created_at', __('Creation date')) !!}</strong></h5>
                                        {!! Form::date('created_at', $impresora->created_at, ['class' => 'form-control']) !!}
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><strong>{!! Form::label('updated_at', __('Edition date')) !!}</strong></h5>
                                        {!! Form::date('updated_at', $impresora->updated_at, ['class' => 'form-control']) !!}
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
                    <h1 class="text-2xl font-bold text-grey-600 mb-4 text-center">{{__('Use for')}}</h1>
                    {!! Form::open(['route' => ['impresoras.relacion',$impresora],'id' => 'persona_form']) !!}
                        
                        <div class="form-group{{ $errors->has('persona_select') ? ' has-error' : '' }}">
                            <h5><strong>{!! Form::label('persona_select', __('Persona')) !!}</strong></h5>
                            {!! Form::select('persona_select', $all, null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('persona_select') }}</small>
                        </div>
                        <br>
                        <div class="btn-group pull-right">
                            {!! Form::submit(__('Add Person'), ['class' => 'btn btn-success','id'=>'add_persona']) !!}
                        </div>
                    {!! Form::close() !!}
                    
                    <br>
                    <ul style="padding-left: 0px;" class="w-full">
                        @foreach ($personas as $persona)
                            <li class="mb-4">
                                <a href="{{route('personas.show',$persona)}}">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="ml-2 text-gray-600">{{$persona->name}}</span></h5>
                                            <p class="card-text ml-2 text-gray-600">  
                                                Tel: {{$persona->telefono_1}}
                                                <br>
                                                {{__('Email')}}: {{$persona->email}}
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
            document.getElementById('comentarios').setAttribute('disabled', 'disabled');
        });
        console.log(inputs);
        $('#add_persona').removeAttr("disabled");
        $('#persona_form>input[name="_token"]').removeAttr("disabled");
    </script>
</x-app-layout>
