@extends('admin.index')

@section("content")
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <h1 class="text-center text-success">{{ __("Listado de productos") }}</h1>
        <!--<a href="{{ route("productos.create") }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            {{ __("Crear proyecto") }}
        </a>-->
    
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-3">
        <div class="text-center">   

            <a href="{{ route('productos.create') }}" class="btn btn-primary hover:bg-success text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded">
                {{ __("Crear producto") }}
            </a>
        </div>
    </div>

<table class="table table-success table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col" class="text-center">{{ ("Nombre") }}</th>
        <th scope="col" class="text-center">{{ ("Precio") }}</th>
        <th scope="col" class="text-center">{{ ("Cantidad") }}</th>
        <th scope="col" class="text-center">{{ ("Fabricante") }}</th>
        <th scope="col" class="text-center">{{ ("Categoría") }}</th>
        <th scope="col" class="text-center">{{ ("Acciones") }}</th>

    </tr>
    </thead>
    <tbody>
    @forelse($productos as $producto)
            <tr>
                <td class="text-center">{{ $producto->name }}</td>
                <td class="text-center">{{ $producto->precio }}</td>
                <td class="text-center">{{ $producto->stock }}</td>
                <td class="text-center">{{ $producto->fabricante }}</td>
                <td class="text-center">{{ $producto->id_categoria }}</td>
                <td class="border px-4 py-2 text-center">
                        <a href="{{ route('productos.edit', ['producto' => $producto]) }}" class="text-white btn btn-primary" style="margin-right: 20px;">{{ __("Editar") }}</a> 
                        <a
                            href="#"
                            class="text-white btn btn-danger"
                            onclick="event.preventDefault();
                                document.getElementById('delete-project-{{ $producto->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-project-{{ $producto->id }}-form" action="{{ route('productos.destroy', ['producto' => $producto]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="12">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold text-dark">{{ __("No hay productos disponibles") }}</strong></p>
                        <span class="block sm:inline text-dark"><strong>{{ __("Todavía no hay nada que mostrar aquí") }}</strong></span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

    @if($productos->count())    
        <div class="mt-3">
            {{ $productos->links() }}
           
        </div>
    @endif

    @if($productos->count() < 1)
        
        <script>
            window.location.replace("/admin/list_productos");
        </script>

    @endif  

</div>
@endsection
