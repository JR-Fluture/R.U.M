<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('List Format SIM')}}</h1>
        </div>
        
        <div class="container bg-white shadow-md overflow-auto p-3">
            <div>
                <div class="card">
                    <div class="card-header container">
                        <div class="col-span-1 w-full h-full flex flex-col justify-center">
                            @can('formatos-sims.create')
                                <a class="btn btn-primary" href="{{route('formatos-sims.create')}}">{{__('Add Format SIM')}}</a>
                            @endcan
                        </div>
                    </div>
                    @if ($formatos_sims->count())
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
                                    @foreach ($formatos_sims as $formatos_sim)
                                        <tr>
                                            <td>{{$formatos_sim->id}}</td>
                                            <td>{{$formatos_sim->name}}</td>
                                            <td>
                                                @can('formatos-sims.edit')
                                                    <a class="btn btn-primary" href="{{route('formatos-sims.edit',$formatos_sim)}}">{{__('Edit')}}</a>    
                                                @endcan
                                            </td>
                                            <td>
                                                @can('formatos-sims.destroy')
                                                <form action="{{route('formatos-sims.destroy',compact('formatos_sim'))}}" method="POST">
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
            {{$formatos_sims->links()}}
        </div>
    </x-dashboard>
</x-app-layout>
