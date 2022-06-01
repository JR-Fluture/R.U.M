<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RUM {{__('List Terminal')}} PDF</title>
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
            <h1>{{__('List Terminal')}}</h1>
        </div>
    </header>
    <main>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('Model Terminal')}}</th>
                        <th>{{__('1º IMEI')}}</th>
                        <th>{{__('2º IMEI')}}</th>
                        <th>{{__('NºSerie')}}</th>
                        <th>{{__('Commentary')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($terminales as $terminale)
                        <tr>
                            <td>{{$terminale->id}}</td>
                            <td>{{$terminale->modelo_terminal->marca_terminal->name.' '.$terminale->modelo_terminal->modelo.' '.$terminale->modelo_terminal->sistema_operativo}}</td>
                            <td>{{$terminale->imei_1}}</td>
                            <td>{{$terminale->imei_2}}</td>
                            <td>{{$terminale->numero_serie}}</td>
                            <td>{{$terminale->comentarios}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>