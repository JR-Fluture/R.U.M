<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('List Supplier')}}</h1>
        </div>
        
        <div class="container bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-header container">
                        <div class="col-span-1 w-full h-full flex flex-col justify-center">
                            @can('proveedores.create')
                                <a class="btn btn-primary" href="{{route('proveedores.create')}}">{{__('Add Supplier')}}</a>
                            @endcan
                        </div>
                    </div>
                    @if ($proveedores->count())
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Commercial')}}</th>
                                        <th colspan="3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proveedores as $proveedore)
                                        <tr>
                                            <td>{{$proveedore->id}}</td>
                                            <td>{{$proveedore->name}}</td>                                            
                                            <td>{{$proveedore->comercial}}</td>
                                            <td>
                                                @can('proveedores.show')
                                                    <a class="btn-success btn" href="{{route('proveedores.show',$proveedore)}}">{{__('Show')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('proveedores.edit')
                                                    <a class="btn btn-primary" href="{{route('proveedores.edit',$proveedore)}}">{{__('Edit')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('proveedores.destroy')
                                                <form action="{{route('proveedores.destroy',compact('proveedore'))}}" method="POST">
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
        <div class="card-footer">
            {{$proveedores->links()}}
        </div>
        
    </x-dashboard>
</x-app-layout>
