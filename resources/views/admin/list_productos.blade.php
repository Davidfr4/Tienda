@extends('admin.index')

@section("content")
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <h1 class="text-center text-success col-lg-12 col-md-12 col-sm-12">{{ __("Listado de productos") }}</h1>
    
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-3 col-lg-12 col-md-12 col-sm-12">
        <div class="text-center">   

            <a href="{{ route('productos.create') }}" class="btn btn-primary hover:bg-success text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded">
                {{ __("Crear producto") }}
            </a>
        </div>
    </div>

    @if(session("success"))
        <script>

            alert("{{ session('success') }}")

        </script>
    @endif

<table class="table table-success table-striped col-lg-12 col-md-12 col-sm-12" style="width: 100%">
    <thead>
    <tr>
        <th scope="col" class="text-center">{{ ("Nombre") }}</th>
        <th scope="col" class="text-center">{{ ("Precio") }}</th>
        <th scope="col" class="text-center">{{ ("Cantidad") }}</th>
        <th scope="col" class="text-center">{{ ("Categoría") }}</th>
        <th scope="col" class="text-center">{{ ("Acciones") }}</th>

    </tr>
    </thead>
    <tbody>
    @forelse($productos as $producto)
            <tr>
                <td class="text-center">{{ $producto->name }}</td>
                <td class="text-center">{{ $producto->precio }}€</td>
                <td class="text-center">{{ $producto->stock }}</td>
                <td class="text-center">{{ $producto->id_categoria }}</td>
                <td class="border px-4 py-2 text-center">
                        <a href="{{ route('productos.edit', ['producto' => $producto]) }}" class="text-white btn" style="margin-right: 20px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil bg-blue rounded" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </a> 
                        <a
                            href="#"
                            class="text-white btn"
                            onclick="event.preventDefault();
                                document.getElementById('delete-project-{{ $producto->id }}-form').submit();"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-square bg-red rounded" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg> 
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
