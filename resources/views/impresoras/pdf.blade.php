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
            <h1>{{__('Printer List')}}</h1>
        </div>
    </header>
    <main>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('Marca')}}</th>
                        <th>{{__('Model')}}</th>
                        <th>{{__('NºSerie')}}</th>
                        <th>{{__('Tinta Original')}}</th>
                        <th>{{__('Tinta Alternativa')}}</th>
                        <th>{{__('Wifi')}}</th>
                        <th>{{__('Red')}}</th> 
                        <th>{{__('Color')}}</th>
                        <th>{{__('Mult')}}</th>
                        <th>{{__('Commets')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($impresoras as $impresora)
                        <tr>
                            <td>{{$impresora->id}}</td>
                            <td>{{$impresora->marca}}</td>
                            <td>{{$impresora->modelo}}</td>
                            <td>{{$impresora->numero_serie}}</td>
                            <td>{{$impresora->tinta_original}}</td>
                            <td>{{$impresora->tinta_alternativo}}</td>
                            <td>{{$impresora->es_wifi==1?'Si':'No'}}</td>
                            <td>{{$impresora->red==1?'Si':'No'}}</td>
                            <td>{{$impresora->color==1?'Si':'No'}}</td>
                            <td>{{$impresora->es_multifuncion==1?'Si':'No'}}</td>                            
                            <td>{{$impresora->comentarios}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>