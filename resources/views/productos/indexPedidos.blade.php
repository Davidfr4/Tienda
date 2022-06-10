@extends('layouts.carrito')

@section("content")
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
    
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">   
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">   

        <div class="col-5 rounded bg-white p-4 m-auto mt-3">
            <div class="text-center">
                <h1 style="font-family: 'Permanent Marker', cursive; font-size: 50px;">{{ __("MIS PEDIDOS") }}</h1>            

            </div>
        </div>

    @if(session("success"))
        <script>

            alert("{{ session('success') }}")

        </script>
    @endif

<table class="table table-success table-striped m-auto mt-5" style="width: 70%;">
    <thead>
    <tr>
        <th scope="col" class="text-center">{{ ("ID Pedido") }}</th>
        <th scope="col" class="text-center">{{ ("Precio") }}</th>
        <th scope="col" class="text-center">{{ ("Calle") }}</th>
        <th scope="col" class="text-center">{{ ("Portal") }}</th>
        <th scope="col" class="text-center">{{ ("Piso") }}</th>
        <th scope="col" class="text-center">{{ ("Fecha Pedido") }}</th>

    </tr>
    </thead>
    <tbody>
    @forelse($pedidos as $pedido)
            <tr>
                <td class="text-center">{{ $pedido->id }}</td>
                <td class="text-center">{{ $pedido->precio_total }}</td>
                <td class="text-center">{{ $pedido->calle }}</td> 
                <td class="text-center">{{ $pedido->portal }}</td> 
                <td class="text-center">{{ $pedido->piso }}</td> 
                <td class="text-center">{{ $pedido->created_at }}</td>                
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="12">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold text-dark">{{ __("No has realizado ningún pedido hasta el momento") }}</strong></p>
                        <span class="block sm:inline text-dark"><strong>{{ __("Todavía no hay nada que mostrar aquí") }}</strong></span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

    <!-- PAGINADOR -->
    @if($pedidos->count())    
        <div class="mt-3">
            {{ $pedidos->links() }}
           
        </div>
    @endif

</div>
@endsection