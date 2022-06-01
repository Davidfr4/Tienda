@extends("layouts.productos")

@section("content")
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <div class="bg-gray-100 col-10 m-auto">
        <div class="p-4 m-auto mt-3">
            <div class="text-center">
                <h1 style="font-family: 'Permanent Marker', cursive; font-size: 50px;">{{ __("Página de productos") }}</h1>            

            </div>
        </div>

        <div class="d-flex justify-content-around col-12 m-auto">
            <div class="row p-3" style="width: 100%;">
                @forelse ($productos as $producto)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="card" style="height: 100%;">
                        <img class="card-img-top m-auto mt-2 p-1" data-bs-toggle="modal" data-bs-target="#mi-modal-{{ $producto->id }}" src="/images/{{ $producto->imagen }}" style="width: 300px; height: 300px">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $producto->name }}</h4>
                            <p class="card-text mt-3" style="height: 50px;">{{ $producto->descripcion }}</p>
                            <h5 class="card-subtitle text-muted mb-2 mt-3">{{ $producto->precio }}€</h5>
                            <h6 class="card-subtitle mb-2 mt-3">Unidades restantes: {{ $producto->stock }}</h6>
                            
                            @if(Auth::check() and Auth::user()->hasRoles('admin'))

                                <a href="{{ route('productos.edit', ['producto' => $producto]) }}" class="text-white text-decoration-none btn btn-primary mt-3" style="margin-right: 20px;">{{ __("Editar") }}</a> 
                                <a
                                    href="#"
                                    class="text-white text-decoration-none btn btn-danger mt-3"
                                    onclick="event.preventDefault();
                                        document.getElementById('delete-project-{{ $producto->id }}-form').submit();"
                                >{{ __("Eliminar") }}
                                </a>
                                <form id="delete-project-{{ $producto->id }}-form" action="{{ route('productos.destroy', ['producto' => $producto]) }}" method="POST" class="hidden">
                                    @method("DELETE")
                                    @csrf
                                </form>
                            
                            @endif
                            @if(Auth::check() and Auth::user()->hasRoles('cliente') )
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $producto->id }}" name="id">
                                    <input type="hidden" value="{{ $producto->name }}" name="name">
                                    <input type="hidden" value="{{ $producto->precio }}" name="precio">
                                    <input type="hidden" value="{{ $producto->stock }}" name="stock">
                                    <input type="hidden" value="1" name="quantity">
                                    <input type="hidden" value="{{ $producto->imagen }}" name="image">
                                    @if($producto->stock > 0)
                                        <button class="px-4 py-2 text-white bg-blue-800 rounded mt-3">Añadir al carrito</button>
                                    @else
                                        <button class="px-4 py-2 text-white bg-blue-200 rounded mt-3" disabled>Añadir al carrito</button>
                                    @endif
                                </form>
                            @endif
                        </div>
                    </div>

                    <div
                        class="modal fade"
                        id="mi-modal-{{ $producto->id }}"
                        tabindex="-1"
                        aria-hidden="true"
                        aria-labelledby="label-modal-{{ $producto->id }}"
                    >
                        <!-- Caja de dialogo -->
                        <div class="modal-dialog">
                            <!-- Contenido de la caja -->
                            <div class="modal-content">
                                <!-- Encabezado de la caja -->
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $producto->name }}</h5>
                                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>

                                <!-- Cuerpo de la caja -->
                                <div class="modal-body">
                                <img class="card-img-top m-auto mt-2" src="/images/{{ $producto->imagen }}" style="width: 500px; height: 500px">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                @empty               

                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative m-auto" role="alert">
                        <p><strong class="font-bold text-dark">{{ __("No hay productos de esta categoría (Componentes de ordenador)") }}</strong></p>
                        <span class="block sm:inline text-dark"><strong>{{ __("Todavía no hay nada que mostrar aquí") }}</strong></span>
                    </div>
                    
                @endforelse
            </div>
        </div>
    </div>
        
    

    @if($productos->count())
        <div class="mt-3 m-auto" style="width: 80%">
            {{ $productos->links() }}
           
        </div>
    @endif

    <?php
    $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if($productos->count() < 1 & $link != 'http://tienda.test/productos') {
    ?>   
        <script>
            window.location.replace("/productos");
        </script>
    <?php
    }
    ?>

@endsection