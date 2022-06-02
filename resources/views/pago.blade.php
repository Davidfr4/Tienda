@extends('layouts.productos')

@section('content')

@if(Auth::check())
<div class="flex justify-center flex-wrap p-4"> 
    <form class="col-8 border-4 bg-white mt-3 row" method="GET" action="{{ route('processTransaction') }}">
        @csrf
        <h1 class="font-semibold py-5 text-blue mb-10 bg-blue-900 text-white px-5 text-center" style="background-color: orange;"> Formulario de pago </h1>
        
        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                    {{ __("Nombre") }}
                </label>
                <input name="name" value="{{ Auth::user()->name }}" readonly="readonly" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre del usuario") }}</p>
                @error("name")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="email">
                    {{ __("Email") }}
                </label>
                <input name="email" value="{{ Auth::user()->email }}" readonly="readonly" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Email de contacto") }}</p>
                @error("email")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="pais">
                    {{ __("País") }}
                </label>
                <input name="pais" placeholder="País" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="pais" type="text" required>
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Escribe tu País") }}</p>
                @error("mensaje")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="provincia">
                    {{ __("Provincia") }}
                </label>
                <input name="provincia" placeholder="Provincia" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="provincia" type="text" required>
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Escribe tu Provincia") }}</p>
                @error("mensaje")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="ciudad">
                    {{ __("Ciudad") }}
                </label>
                <input name="ciudad" placeholder="Ciudad" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="ciudad" type="text" required>
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Escribe tu Ciudad") }}</p>
                @error("mensaje")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="codigoPostal">
                    {{ __("Codigo Postal") }}
                </label>
                <input name="codigoPostal" placeholder="Codigo Postal" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="codigoPostal" type="text" required>
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Escribe tu Codigo Postal") }}</p>
                @error("mensaje")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="calle">
                    {{ __("Calle") }}
                </label>
                <input name="calle" placeholder="Calle" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="calle" type="text" required>
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Escribe tu Calle") }}</p>
                @error("mensaje")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="portal">
                    {{ __("Portal") }}
                </label>
                <input name="portal" placeholder="Portal" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="portal" type="text" required>
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Escribe tu Portal") }}</p>
                @error("mensaje")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="piso">
                    {{ __("Piso") }}
                </label>
                <input name="piso" placeholder="Piso" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="piso" type="text" required>
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Escribe tu Piso") }}</p>
                @error("mensaje")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap mt-5 col-lg-6 col-md-6 col-sm-12">
            <div class="w-full px-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="precio_total">
                    {{ __("Total a pagar") }}
                </label>
                <input type="text" readonly="readonly" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{ Cart::getTotal() }} €" name="precio_total">
                <p class="text-gray-600 text-xs italic -my-3">{{ __("Precio total a pagar por el pedido") }}</p>
                @error("mensaje")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    Debe rellenar este campo
                </div>
                @enderror
            </div>
        </div>

        <!-- INPUTS OCULTO PARA ID_USUARIO -->
        <input type="hidden" value="{{ Auth::user()->id }}" name="id_usuario">

        <div class="md:flex md:items-center col-12 mb-3 mx-5">
            <div class="md:w-1/3">
                <button name="comprar" id="comprar" class="shadow bg-teal-400 mt-5 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="{{ Cart::getTotal() }}">
                    {{ 'Pagar' }}
                </button>
            </div>
        </div>
    </form>
    </div>
</div>
@endif


@if(!Auth::check())

    <section class="flex flex-col break-words bg-white sm:border-1 mt-5 sm:rounded-md sm:shadow-sm sm:shadow-lg">

        <header class="font-semibold bg-gray-200 text-gray-700 px-6 sm:py-6 sm:px-8 sm:rounded-t-md" style="background-color: orange;">
            ¡Alerta!
        </header>

        <div class="w-full p-4">
            <p class="text-gray-700">
                Necesitas estar logueado para utilizar esta pestaña.
            </p>
        </div>

    </section>

@endif

@endsection