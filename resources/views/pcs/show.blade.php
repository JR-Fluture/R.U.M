<x-app-layout>
    <div class="container py-8">           
        <div>
            <h1 class="text-center text-4xl font-bold">{{__('Show data')}}</h1>
        </div>
        <div class="container-lg bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($pc, ['class' => 'form-horizontal', 'autocomplete'=>'off']) !!}
                            @include('pcs.partials.form')
                            <br>
                            <div class="form-group">
                                <h5><strong>{!! Form::label('created_at', __('Creation date')) !!}</strong></h5>
                                {!! Form::date('created_at', $pc->created_at, ['class' => 'form-control']) !!}
                            </div>
                            <br>
                            <div class="form-group">
                                <h5><strong>{!! Form::label('updated_at', __('Edition date')) !!}</strong></h5>
                                {!! Form::date('updated_at', $pc->updated_at, ['class' => 'form-control']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        const inputs = document.querySelectorAll('input');

        inputs.forEach(element => {
            element.setAttribute('disabled', 'disabled');
            document.getElementById('comentarios').setAttribute('disabled', 'disabled');
        });
        console.log(inputs);
    </script>
</x-app-layout>
