<x-app-layout>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>        
    @endif
    <div class="py-8">
        <h1 class=" text-center">{{__('Terminal Incidents List')}}</h1>
    </div>
    
    <div class="container-lg bg-white shadow-md overflow-auto p-3">
        <div>
            @livewire('incidencia-terminal-index')
        </div>
    </div>
    
</x-app-layout>