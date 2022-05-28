<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('List from roles')}}</h1>
        </div>
        
        <div class="container bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-header container">
                        
                        <div class="col-span-1 w-full h-full flex flex-col justify-center">
                            @can('roles.create')
                                <a class="btn btn-primary" href="{{route('roles.create')}}">{{__('Add role')}}</a>
                            @endcan
                        </div>
                    </div>
                    @if ($roles->count())
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
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->color}}</td>
                                            <td>
                                                @can('roles.edit')
                                                    <a class="btn btn-primary" href="{{route('roles.edit',$role)}}">{{__('Edit')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('roles.destroy')
                                                <form action="{{route('roles.destroy',compact('role'))}}" method="POST">
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
