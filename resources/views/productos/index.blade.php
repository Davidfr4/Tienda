@extends("layouts.app")

@section("content")

    @if(Auth::check() and Auth::user()->hasRoles('admin'))
        <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5 m-auto" style="width: 80%">
            <div class="text-center">
                <h1 class="mb-4">{{ __("Listado de productos") }}</h1>            

                <a href="{{ route('productos.create') }}" class="bg-success hover:bg-danger text-underline-none text-white text-decoration-none font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded">
                    {{ __("Crear producto") }}
                </a>
            </div>
        </div>
    @endif

    @if(Auth::check() and Auth::user()->hasRoles('cliente'))
        <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5 m-auto" style="width: 80%">
            <div class="text-center">
                <h1 class="mb-4">{{ __("Listado de productos") }}</h1>            
            </div>
        </div>
    @endif

    <table class="border-separate table-success bg-success border-2 text-center border-gray-500 mt-3 m-auto" style="width: 80%">
        <thead>
        <tr>
            <th class="px-4 py-2">{{ __("Nombre") }}</th>
            <th class="px-4 py-2">{{ __("Precio") }}</th>
            <th class="px-4 py-2">{{ __("Cantidad") }}</th>
            <th class="px-4 py-2">{{ __("Fabricante") }}</th>
            <th scope="px-4 py-2">{{ ("Acciones") }}</th>
           
            
        </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <td class="border px-4 py-2">{{ $producto->name }}</td>
                    <td class="border px-4 py-2">{{ $producto->precio }}</td>
                    <td class="border px-4 py-2">{{ $producto->cantidad }}</td>
                    <td class="border px-4 py-2">{{ $producto->fabricante }}</td>
                    @if(Auth::check() and Auth::user()->hasRoles('admin'))
                        <td class="border px-4 py-2">
                            <a href="{{ route('productos.edit', ['producto' => $producto]) }}" class="text-white text-decoration-none btn btn-primary" style="margin-right: 20px;">{{ __("Editar") }}</a> 
                            <a
                                href="#"
                                class="text-white text-decoration-none btn btn-danger"
                                onclick="event.preventDefault();
                                    document.getElementById('delete-project-{{ $producto->id }}-form').submit();"
                            >{{ __("Eliminar") }}
                            </a>
                            <form id="delete-project-{{ $producto->id }}-form" action="{{ route('productos.destroy', ['producto' => $producto]) }}" method="POST" class="hidden">
                                @method("DELETE")
                                @csrf
                            </form>
                        </td>
                    @endif
                    @if(Auth::check() and Auth::user()->hasRoles('cliente'))
                        <td class="border px-4 py-2"><a href="https://www.paypal.com/" class="text-white text-decoration-none">Comprar</a></td>
                    @endif
                </tr>

            @empty               

                <tr>
                    <td colspan="12">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative m-auto" role="alert">
                            <p><strong class="font-bold text-dark">{{ __("No hay productos") }}</strong></p>
                            <span class="block sm:inline text-dark"><strong>{{ __("Todavía no hay nada que mostrar aquí") }}</strong></span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
        
    </table>

    @if($productos->count())
        <div class="mt-3 m-auto" style="width: 80%">
            {{ $productos->links() }}
           
        </div>
    @endif

@endsection