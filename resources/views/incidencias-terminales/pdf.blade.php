<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RUM {{__('Terminal Incidents List')}} PDF</title>
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
            <h1>{{__('Terminal Incidents List')}}</h1>
        </div>
    </header>
    <main>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>
                            {{__('Business')}}
                        </th>
                        <th>
                            {{__('Conclusion')}}
                        </th>                    
                        <th>
                            {{__('Commentary')}}
                        </th>
                        <th>
                            {{'ID '.__('Use Terminal')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidencias_terminales as $incidencias_terminal)
                        <tr>
                            <td>{{$incidencias_terminal->id}}</td>
                            <td>{{$incidencias_terminal->asunto}}</td>
                            <td>{{$incidencias_terminal->conclusion}}</td>
                            <td>{{$incidencias_terminal->comentarios}}</td>
                            <td>{{$incidencias_terminal->uso_terminal->id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>