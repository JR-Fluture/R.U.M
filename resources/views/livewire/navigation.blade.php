<nav class="bg-gray-800 z-30" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img class="h-8 w-8" src="/storage/img/logo.png" alt="IconNavigation">
                    <h3 class="h3 ml-2 mt-3 text-sm text-gray-300">R.U.M</h3>
                </a>

                @auth
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            {{-- <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a> --}}
                            <div class="ml-4 flex items-center">
                                @foreach ($menu as $item)
                                    @can($item['rol'])
                                        @isset($item['array'])
                                            <!-- Menu dropdown -->
                                            <div class="ml-3" x-data="{ open: false }" style="z-index: 1;">
                                                <div>
                                                    <button x-on:click="open=true" type="button" class="max-w-xs text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                        {{__($item['name'])}}
                                                    </button>
                                                </div>
                                                <div x-show="open" x-on:click.away="open=false" class="origin-top-right absolute mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                                    @foreach ($item['array'] as $list)
                                                        @can($list['rol'])
                                                            <a href="{{$list['ruta']}}" class="{{request()->routeIs($list['ruta'])?'active':''}} block px-4 py-2 text-sm text-gray-700 hover:bg-gray-700 hover:text-white rounded-md">{{__($list['name'])}}</a>
                                                        @endcan
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{$item['ruta']}}" class="{{request()->routeIs($item['ruta'])?'active':''}} block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded-md">{{__($item['name'])}}</a>
                                        @endisset
                                    @endcan
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
            @auth
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button x-on:click="open=true" type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">{{__('Open user menu')}}</span>
                                    <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                                </button>
                            </div>

                            <!--
                            Dropdown menu, show/hide based on menu state.

                            Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                            Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div x-show="open" x-on:click.away="open=false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{route('profile.show')}}" class="{{request()->routeIs('profile.show')?'active':''}} block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">{{__('Your Profile')}}</a>
                                @can('admin.home')
                                    <a href="{{route('admin.home')}}" class="{{request()->routeIs('admin.home')?'active':''}} block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">{{__('Dashboard')}}</a>
                                @endcan
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">{{__('Logout')}}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- @else
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <a href="{{route('login')}}" class="{{request()->routeIs('login')?'active':''}} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{__('Login')}}</a>
                        <a href="{{route('register')}}" class="{{request()->routeIs('register')?'active':''}} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{__('Register')}}</a>
                    </div>
                </div> --}}
            @endauth
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button x-on:click="open=true" type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                    Heroicon name: outline/menu

                    Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                    Heroicon name: outline/x

                    Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu" x-show="open" x-on:click.away="open=false">
        @auth
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                {{-- <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a> --}}
                @foreach ($menu as $item)
                    @can($item['rol'])
                        <div class="border-b border-gray-700">
                            @isset($item['array'])
                                    <h1 class="bg-gray-900 text-gray-300 block px-3 py-2 rounded-md text-base font-medium" aria-current="page">{{$item['name']}}</h1>
                                
                                    @foreach ($item['array'] as $list)
                                        @can($list['rol'])
                                            <a href="{{$list['ruta']}}" class="block px-4 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">{{__($list['name'])}}</a>
                                        @endcan
                                    @endforeach
                            @else
                                    <a href="{{$item['ruta']}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{__($item['name'])}}</a>
                            @endisset
                            <!-- hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1 -->
            
                        </div>
                    @endcan
                @endforeach
                @canany(['usuarios.index', 'roles.index'])
                    <h4 class="text-white text-center font-semibold tracking-tighter">{{__('Users')}}</h4>
                @endcanany
                @can('usuarios.index')
                    <a href="{{route('usuarios.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Usuario')}}
                    </a>
                @endcan
                @can('roles.index')
                    <a href="{{route('roles.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Roles')}}
                    </a>
                @endcan

                @can('departamentos.index')
                    <br>
                    <h4 class="text-white text-center font-semibold tracking-tighter">{{__('Person')}}</h4>
                    <a href="{{route('departamentos.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Departamentos')}}
                    </a>
                @endcan


                @canany(['formatos-sims.index', 'tipos-sims.index', 'tipos-lineas.index', 'marcas-terminales.index', 'tipos-terminales.index', 'tipos-cargadores.index', 'contratos.index', 'proveedores.index'])
                    <br>
                    <h4 class="text-white text-center font-semibold tracking-tighter">{{__('Mobile')}}</h4>
                @endcanany
                @can('formatos-sims.index')
                    <a href="{{route('formatos-sims.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Formato SIM')}}
                    </a>
                @endcan
                @can('tipos-sims.index')
                    <a href="{{route('tipos-sims.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Tipos de SIM')}}
                    </a>
                @endcan
                @can('tipos-lineas.index')
                    <a href="{{route('tipos-lineas.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Tipos de linea')}}
                    </a>
                @endcan
                @can('marcas-terminales.index')
                    <a href="{{route('marcas-terminales.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Marcas de terminal')}}
                    </a>
                @endcan
                @can('tipos-terminales.index')
                    <a href="{{route('tipos-terminales.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Tipos de terminal')}}
                    </a>
                @endcan
                @can('tipos-cargadores.index')
                    <a href="{{route('tipos-cargadores.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Tipos de cargador')}}
                    </a>
                @endcan
                @can('proveedores.index')
                    <a href="{{route('proveedores.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Proveedores')}}
                    </a>
                @endcan
                @can('contratos.index')
                    <a href="{{route('contratos.index')}}" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{__('Contratos')}}
                    </a>
                @endcan
            </div>
        @endauth
        @auth
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-3">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ auth()->user()->email }}</div>
                    </div>
                    {{-- <button type="button" class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">{{__('View notifications')}}</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button> --}}
                </div>
                
                <div class="mt-3 px-2 space-y-1">
                    <a href="{{route('profile.show')}}" class="{{request()->routeIs('profile.show')?'active':''}} block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">{{__('Your Profile')}}</a>
                    @can('admin.home')
                        <a href="{{route('admin.home')}}" class="{{request()->routeIs('admin.home')?'active':''}} block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">{{__('Dashboard')}}</a>
                    @endcan
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{ route('logout') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700" @click.prevent="$root.submit();">{{__('Logout')}}</a>
                    </form>
                </div>                
            </div>
        {{-- @else
            <div class='pt-4 pb-3 border-t border-gray-700'>
                <div class="mt-3 px-2 space-y-1">
                    <a href="{{route('login')}}" class="{{request()->routeIs('login')?'active':''}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{__('Login')}}</a>
                    <a href="{{route('register')}}" class="{{request()->routeIs('register')?'active':''}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{__('Register')}}</a>
                </div>
            </div> --}}
        @endauth
    </div>
</nav>