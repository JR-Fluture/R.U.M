<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RUM {{__('Uso PC List')}} PDF</title>
    <link rel="stylesheet" href="{{ public_path('css/css.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}" type="text/css">
</head>
<body>
    <header>
        <div id="cabecera">
            <img id="logo" src="{{public_path().'/storage/img/logo.png'}}" alt="IconNavigation">
            <h3 class="nameLogo">R.U.M</h3>
        </div>
        <div id="titulo_pdf">
            <h1>{{__('Use PC List')}}</h1>
        </div>
    </header>
    <main>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('PC')}}</th>
                        <th>{{__('Persona')}}</th>
                        <th>{{__('Monitor')}}</th>
                        <th>{{__('Commentary')}}</th>
                        <th>{{__('In use')}}</th>
                        <th>{{__('End of use date')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usopcs as $usopc)
                        <tr>
                            <td>{{$usopc->id}}</td>
                            <td>{{$usopc->pc->id.'.-'.$usopc->pc->microprocesador.' /-/ '.$usopc->pc->placa_base.' /-/ '.$usopc->pc->sistema_operativo}}</td>
                            <td>{{$usopc->persona->id.'.-'.$usopc->persona->name.' /-/ '.$usopc->persona->dni}}</td>
                            <td>{{$usopc->monitor->id.'.-'.$usopc->monitor->marca.' /-/ '.$usopc->monitor->modelo}}</td>
                            <td>{{$usopc->comentarios}}</td>
                            <td>{{$usopc->en_uso == 1 ? 'Si' : 'No'}}</td>
                            <td>{{$usopc->fin_uso}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>