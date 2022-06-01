<!-- Sidebar layout -->
<div class="flex flex-row">
    <div class="sm-none transition duration-200 transform sm:translate-x-0 sidebar z-0 w-60 h-auto bg-gray-800 hidden md:block flex-col pt-5 mr-16">
        <div class="nav-items flex flex-col mx-2 space-y-4">
        </div>
    </div>
    <div id='menu_dashboard' class="fixed sm-none transition duration-200 transform sm:translate-x-0 sidebar z-20 w-60 h-screen bg-gray-800 hidden md:block flex-col pt-5">

        <div class="nav-items flex flex-col mx-2 space-y-4">
            
            @canany(['usuarios.index', 'roles.index'])
                <h4 class="text-white text-center font-semibold tracking-tighter">{{__('Users')}}</h4>
            @endcanany
            @can('usuarios.index')
                <a href="{{route('usuarios.index')}}" class="{{request()->routeIs('usuarios.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Usuario')}}
                </a>
            @endcan
            @can('roles.index')
                <a href="{{route('roles.index')}}" class="{{request()->routeIs('roles.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Roles')}}
                </a>
            @endcan

            @can('departamentos.index')
                <br>
                <h4 class="text-white text-center font-semibold tracking-tighter">{{__('Person')}}</h4>
                <a href="{{route('departamentos.index')}}" class="{{request()->routeIs('departamentos.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Departamentos')}}
                </a>
            @endcan


            @canany(['formatos-sims.index', 'tipos-sims.index', 'tipos-lineas.index', 'marcas-terminales.index', 'tipos-terminales.index', 'tipos-cargadores.index', 'contratos.index', 'proveedores.index'])
                <br>
                <h4 class="text-white text-center font-semibold tracking-tighter">{{__('Mobile')}}</h4>
            @endcanany
            @can('formatos-sims.index')
                <a href="{{route('formatos-sims.index')}}" class="{{request()->routeIs('formatos-sims.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Formato SIM')}}
                </a>
            @endcan
            @can('tipos-sims.index')
                <a href="{{route('tipos-sims.index')}}" class="{{request()->routeIs('tipos-sims.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Tipos de SIM')}}
                </a>
            @endcan
            @can('tipos-lineas.index')
                <a href="{{route('tipos-lineas.index')}}" class="{{request()->routeIs('tipos-lineas.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Tipos de linea')}}
                </a>
            @endcan
            @can('marcas-terminales.index')
                <a href="{{route('marcas-terminales.index')}}" class="{{request()->routeIs('marcas-terminales.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Marcas de terminal')}}
                </a>
            @endcan
            @can('tipos-terminales.index')
                <a href="{{route('tipos-terminales.index')}}" class="{{request()->routeIs('tipos-terminales.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Tipos de terminal')}}
                </a>
            @endcan
            @can('tipos-cargadores.index')
                <a href="{{route('tipos-cargadores.index')}}" class="{{request()->routeIs('tipos-cargadores.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Tipos de cargador')}}
                </a>
            @endcan
            @can('proveedores.index')
                <a href="{{route('proveedores.index')}}" class="{{request()->routeIs('proveedores.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Proveedores')}}
                </a>
            @endcan
            @can('contratos.index')
                <a href="{{route('contratos.index')}}" class="{{request()->routeIs('contratos.*')?'active':''}} btn text-sm text-white hover:bg-gray-700 hover:text-white  hover:shadow-lg transition duration-200 hover:cursor-pointer px-4 rounded-md py-1">
                    {{__('Contratos')}}
                </a>
            @endcan
        </div>
    </div>
    <div class="container-lg">
        {{ $slot }}
    </div>
</div>
<script>
    window.onscroll = function() {myFunction()};
    
    var navbar = document.getElementById("menu_dashboard");
    var sticky = navbar.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
</script>