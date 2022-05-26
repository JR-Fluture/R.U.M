<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/css.css">
        <link rel="stylesheet" href="/css/menu.css">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        
        <script src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" data-auto-replace-svg="nest"></script>
        <style>
            @media(min-width:640px){
                .logoBar{
                    background-image: url(https://upload.wikimedia.org/wikipedia/commons/d/d7/Escudo_de_El_Puig.svg);
                    background-repeat: repeat-y;
                    background-size: 50px;
                }
            }
            @media(min-width:1024px){
                .logoBar{
                    background-image: url(https://upload.wikimedia.org/wikipedia/commons/d/d7/Escudo_de_El_Puig.svg);
                    background-repeat: repeat-y;
                    background-size: 100px;
                }
            }
        </style>
        
        
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="/js/menu.js" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-blue-50 logoBar">

            @livewire('navigation')
                

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <x-footer/>
    </body>
</html>