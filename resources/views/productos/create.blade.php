@extends("layouts.productos")

@section("content")
    @if(Auth::check() and Auth::user()->hasRoles('admin'))
        <div class="flex justify-center flex-wrap p-4 mt-5">
            @include("productos.form")
        </div>
    @endif

    @if(Auth::check() and Auth::user()->hasRoles('cliente'))
        <div class="col-6 m-auto">
        <section class="flex flex-col break-words sm:border-1 mt-5 sm:rounded-md sm:shadow-sm sm:shadow-lg">
            <header class="font-semibold bg-red-600 text-gray-700 px-6 sm:py-6 sm:px-8 sm:rounded-md text-white text-center">
                Usted no tiene acceso a está página.
            </header>
            <a href="/" class="btn btn-success col-3 m-auto px-6 py-2 text-white mt-5">Volver a inicio.</a>
        </section>
        </div>
    @endif

@endsection