<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans" style="background-image: url(https://www.citipa.org/wp-content/uploads/2020/11/keyboard-616492_duotono_recortada-1600x900.jpg); background-repeat: no-repeat; background-size: cover;">
    <div id="app">
        <header class="py-6" style="background-color: orange;">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline px-5">
                        {{ ("Inicio") }}
                    </a>

                    @auth
                    
                        <a href="{{ route('productos.index') }}" class="text-lg font-semibold text-gray-100 no-underline px-5">
                            {{ __("Productos") }}

                        <a href="{{ route('contacta.index') }}" class="text-lg font-semibold text-gray-100 no-underline px-5">
                            {{ __("Contacto") }}

                        @if(Auth::check() and Auth::user()->hasRoles('admin'))
                            <a href="{{ route('admin.index') }}" class="text-lg font-semibold text-gray-100 no-underline px-5">
                                {{ __("Panel administrador") }}
                        @endif

                    @endauth

                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline text-white btn btn-primary" href="{{ route('login') }}">{{ __('Acceder') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline btn btn-primary" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="btn btn-danger text-white no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Desconectarse') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
        @if(session("success"))
        <div class="container mx-auto mt-5">
            <div class="bg-red-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">{{ __("Alerta") }}</p>
                        <p class="text-sm">{{ session("success") }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
