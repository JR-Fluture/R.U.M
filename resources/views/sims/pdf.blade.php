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
            <h1>{{__('List SIM')}}</h1>
        </div>
    </header>
    <main>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('Number SIM')}}</th>
                        <th>{{__('PIN')}}</th>
                        <th>{{__('PUK')}}</th>
                        <th>{{__('Comentaries')}}</th>
                        <th>{{__('Format SIM')}}</th>
                        <th>{{__('Line')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sims as $sim)
                        <tr>
                            <td>{{$sim->id}}</td>
                            <td>{{$sim->numero_sim}}</td>
                            <td>{{$sim->pin}}</td>
                            <td>{{$sim->puk}}</td>
                            <td>{{$sim->comentarios}}</td>
                            <td>{{$sim->formato_sim->name}}</td>
                            <td>{{$sim->linea->numero_movil.' /-/ '.$sim->linea->numero_interno.' /-/ '.$sim->linea->numero_fijo}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>