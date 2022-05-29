<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('List Type Line')}}</h1>
        </div>
        
        <div class="container bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-header container">
                        <div class="col-span-1 w-full h-full flex flex-col justify-center">
                            @can('tipos-lineas.create')
                                <a class="btn btn-primary" href="{{route('tipos-lineas.create')}}">{{__('Add Type Line')}}</a>
                            @endcan
                        </div>
                    </div>
                    @if ($tipos_lineas->count())
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Description')}}</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipos_lineas as $tipos_linea)
                                        <tr>
                                            <td>{{$tipos_linea->id}}</td>
                                            <td>{{$tipos_linea->tipo_linea}}</td>
                                            <td>{{$tipos_linea->descripcion}}</td>
                                            <td>
                                                @can('tipos-lineas.edit')
                                                    <a class="btn btn-primary" href="{{route('tipos-lineas.edit',$tipos_linea)}}">{{__('Edit')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('tipos-lineas.destroy')
                                                <form action="{{route('tipos-lineas.destroy',compact('tipos_linea'))}}" method="POST">
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
            {{$tipos_lineas->links()}}
        </div>
        
    </x-dashboard>
</x-app-layout>
