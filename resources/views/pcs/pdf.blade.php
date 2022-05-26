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
            <h3 class="nameLogo">R.U.M</h3>
        </div>
        <div id="titulo_pdf">
            <h1>{{__('PC List')}}</h1>
        </div>
    </header>
    <main>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('MicroProcesador')}}</th>
                        <th>{{__('Placa Base')}}</th>
                        <th>{{__('RAM')}}</th>
                        <th>{{__('Almacenamiento')}}</th>
                        <th>{{__('Conector')}}</th>
                        <th>{{__('Sistema Operativo')}}</th>
                        <th>{{__('Activacion')}}</th>
                        <th>{{__('Nºinventario')}}</th>
                        <th>{{__('Commets')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pcs as $pc)
                        <tr>
                            <td>{{$pc->id}}</td>
                            <td>{{$pc->microprocesador}}</td>                            
                            <td>{{$pc->placa_base}}</td>
                            <td>{{$pc->tipo_ram.'-'.$pc->ram.'GB'}}</td>
                            <td>{{$pc->tipo_almacenamiento.'-'.$pc->capacidad_almacenamiento.'GB'}}</td>
                            <td>{{$pc->tipos_conector}}</td>
                            <td>{{$pc->sistema_operativo}}</td>
                            <td>{{$pc->activacion==1?'Si':'No'}}</td>                       
                            <td>{{$pc->numero_inventario}}</td>
                            <td>{{$pc->comentarios}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>