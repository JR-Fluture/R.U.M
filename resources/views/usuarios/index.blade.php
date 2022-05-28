<x-app-layout>
    <x-dashboard>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>        
        @endif
        <div class="py-8">
            <h1 class=" text-center">{{__('Users List')}}</h1>
        </div>
        
        <div class="container bg-white shadow-md overflow-auto p-3">
            <div>
                @livewire('usuario-index')
            </div>
        </div>
    </x-dashboard>
</x-app-layout>