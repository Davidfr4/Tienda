@extends('admin.index')

@section("content")
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <h1 class="text-center text-success col-lg-12 col-md-12 col-sm-12">{{ __("Listado de pedidos") }}</h1>

    @if(session("success"))
        <script>

            alert("{{ session('success') }}")

        </script>
    @endif

<table class="table table-success table-striped col-lg-12 col-md-12 col-sm-12 mt-5" style="width: 100%">
    <thead>
    <tr>
        <th scope="col" class="text-center">{{ ("ID Pedido") }}</th>
        <th scope="col" class="text-center">{{ ("ID Usuario") }}</th>
        <th scope="col" class="text-center">{{ ("Nombre") }}</th>
        <th scope="col" class="text-center">{{ ("Precio") }}</th>
        <th scope="col" class="text-center">{{ ("Codigo Postal") }}</th>
        <th scope="col" class="text-center">{{ ("Fecha Pedido") }}</th>

    </tr>
    </thead>
    <tbody>
    @forelse($pedidos as $pedido)
            <tr>
                <td class="text-center">{{ $pedido->id }}</td>
                <td class="text-center">{{ $pedido->id_usuario }}</td>
                <td class="text-center">{{ $pedido->name }}</td>
                <td class="text-center">{{ $pedido->precio_total }}</td>
                <td class="text-center">{{ $pedido->codigoPostal }}</td>
                <td class="text-center">{{ $pedido->created_at }}</td>                
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="12">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold text-dark">{{ __("No hay pedidos realizados") }}</strong></p>
                        <span class="block sm:inline text-dark"><strong>{{ __("Todavía no hay nada que mostrar aquí") }}</strong></span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

    @if($pedidos->count())    
        <div class="mt-3">
            {{ $pedidos->links() }}
           
        </div>
    @endif

    @if($pedidos->count() < 1)
        
        <script>
            window.location.replace("/admin/list_pedidos");
        </script>

    @endif  

</div>
@endsection
