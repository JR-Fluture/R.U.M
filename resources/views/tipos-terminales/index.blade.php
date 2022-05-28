<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('List Type Terminal')}}</h1>
        </div>
        
        <div class="container bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-header container">
                        <div class="col-span-1 w-full h-full flex flex-col justify-center">
                            @can('tipos-terminales.create')
                                <a class="btn btn-primary" href="{{route('tipos-terminales.create')}}">{{__('Add Type Terminal')}}</a>
                            @endcan
                        </div>
                    </div>
                    @if ($tipos_terminales->count())
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
                                    @foreach ($tipos_terminales as $tipos_terminale)
                                        <tr>
                                            <td>{{$tipos_terminale->id}}</td>
                                            <td>{{$tipos_terminale->name}}</td>
                                            <td>
                                                @can('tipos-terminales.edit')
                                                    <a class="btn btn-primary" href="{{route('tipos-terminales.edit',$tipos_terminale)}}">{{__('Edit')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('tipos-terminales.destroy')
                                                <form action="{{route('tipos-terminales.destroy',compact('tipos_terminale'))}}" method="POST">
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
