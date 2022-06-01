<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RUM {{__('People List')}} PDF</title>
    <link rel="stylesheet" href="{{ public_path('css/css.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}" type="text/css">
</head>
<body>
    <header>
        <div id="cabecera">
            <img id="logo" src="{{public_path().'/storage/img/logo.png'}}" alt="IconNavigation">
            <h3 class="nameLogo">R.U.M.</h3>
        </div>
        <div id="titulo_pdf">
            <h1>{{__('List Model Terminal')}}</h1>
        </div>
    </header>
    <main>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('Type Terminal')}}</th>
                        <th>{{__('Mark Terminal')}}</th>
                        <th>{{__('Model')}}</th>
                        <th>{{__('S.O.')}}</th>
                        <th>{{__('It Is Dual SIM')}}</th>
                        <th>{{__('Internal Storage')}}</th>
                        <th>{{__('External Storage')}}</th>
                        <th>{{__('It Is Access Point')}}</th>
                        <th>{{__('Commentary')}}</th>
                        <th>{{__('Type Charger')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modelos_terminales as $modelos_terminal)
                        <tr>
                            <td>{{$modelos_terminal->id}}</td>
                            <td>{{$modelos_terminal->tipo_terminal->name}}</td>
                            <td>{{$modelos_terminal->marca_terminal->name}}</td>
                            <td>{{$modelos_terminal->modelo}}</td>
                            <td>{{$modelos_terminal->sistema_operativo}}</td>
                            <td>{{$modelos_terminal->es_doble_sim==1?'Si':'No'}}</td>
                            <td>{{$modelos_terminal->almacenamiento_interno.'GB'}}</td>
                            <td>{{$modelos_terminal->almacenamiento_externo==null?'0GB':$modelos_terminal->almacenamiento_externo.'GB'}}</td>
                            <td>{{$modelos_terminal->es_punto_acceso==1?'Si':'No'}}</td>
                            <td>{{$modelos_terminal->comentario}}</td>
                            <td>{{$modelos_terminal->tipo_cargador->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>