<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('List Contract')}}</h1>
        </div>
        
        <div class="container bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-header container">
                        <div class="col-span-1 w-full h-full flex flex-col justify-center">
                            @can('contratos.create')
                                <a class="btn btn-primary" href="{{route('contratos.create')}}">{{__('Add Contract')}}</a>
                            @endcan
                        </div>
                    </div>
                    @if ($contratos->count())
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{__('ID Contact')}}</th>
                                        <th>{{__('Supplier')}}</th>
                                        <th>{{__('Description')}}</th>
                                        <th colspan="3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contratos as $contrato)
                                        <tr>
                                            <td>{{$contrato->id}}</td>
                                            <td>{{$contrato->IDCONTACTO}}</td>
                                            <td>{{$contrato->proveedor->name}}</td>
                                            <td>{{$contrato->descripcion}}</td>
                                            <td>
                                                @can('contratos.show')
                                                    <a class="btn-success btn" href="{{route('contratos.show',$contrato)}}">{{__('Show')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('contratos.edit')
                                                    <a class="btn btn-primary" href="{{route('contratos.edit',$contrato)}}">{{__('Edit')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('contratos.destroy')
                                                <form action="{{route('contratos.destroy',compact('contrato'))}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="card-body">
                            <strong>{{__('There is no record')}}</strong>
                        </div>
                    @endif
                </div>       
            </div>
        </div>
        
    </x-dashboard>
</x-app-layout>
