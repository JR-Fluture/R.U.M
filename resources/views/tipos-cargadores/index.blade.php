<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('List Type Charger')}}</h1>
        </div>
        
        <div class="container bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-header container">
                        <div class="col-span-1 w-full h-full flex flex-col justify-center">
                            @can('tipos-cargadores.create')
                                <a class="btn btn-primary" href="{{route('tipos-cargadores.create')}}">{{__('Add Type Charger')}}</a>
                            @endcan
                        </div>
                    </div>
                    @if ($tipos_cargadores->count())
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{__('Name')}}</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipos_cargadores as $tipos_cargadore)
                                        <tr>
                                            <td>{{$tipos_cargadore->id}}</td>
                                            <td>{{$tipos_cargadore->name}}</td>
                                            <td>
                                                @can('tipos-cargadores.edit')
                                                    <a class="btn btn-primary" href="{{route('tipos-cargadores.edit',$tipos_cargadore)}}">{{__('Edit')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('tipos-cargadores.destroy')
                                                <form action="{{route('tipos-cargadores.destroy',compact('tipos_cargadore'))}}" method="POST">
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
            {{$tipos_cargadores->links()}}
        </div>
        
    </x-dashboard>
</x-app-layout>
