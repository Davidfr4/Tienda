@extends('layouts.carrito')

@section('content')
      
      <!-- OPCIÓN SI EL CARRITO NO ESTÁ VACIO -->
      @if(Cart::getTotalQuantity() > 0) 
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white col-lg-12 col-md-12 col-sm-12 shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                        <script>

                          alert("{{ session('success') }}")

                        </script>
                      @endif
                        <h3 class="text-3xl text-bold text-center">Carrito de la compra</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-center">Nombre</th>
                              <th class="pl-5 text-center">
                                <span class="lg:hidden" title="Quantity">Ctd</span>
                                <span class="hidden lg:inline">Cantidad</span>
                              </th>
                              <th class="hidden text-right md:table-cell text-center"> Precio</th>
                              <th class="hidden text-right md:table-cell text-center"> Eliminar </th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr>
                              <td class="hidden text-center pb-4 md:table-cell">
                                <img src="images/{{ $item->attributes->image }}" class="w-20 rounded mt-4" style="width: 100px; height: 100px;" alt="">
                              </td>

                              <td>
                                <p class="mb-2 md:ml-4 text-center">{{ $item->name }}</p>
                              </td>

                              <td class="hidden text-center md:table-cell">
                                  <div class="text-center">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id }}" >
                                      <input type="number" min=1 max="{{ $item->stock }}" name="quantity" value="{{ $item->quantity }}" 
                                      class="w-11 text-center bg-gray-200 rounded"action="{{ route('cart.update') }}"/>
                                    </form>
                                  </div>
                              </td>

                              <td class="hidden text-center md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ${{ $item->price }}
                                </span>
                              </td>

                              <td class="hidden text-center md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-square bg-red-600 rounded" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg> 
                                  </button>
                                </form>
                              </td>

                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div class="mt-3">
                         Total: ${{ Cart::getTotal() }}
                        </div>

                        <div class="row mt-3">
                          <div class="col-lg-2 col-md-3 col-sm-4">
                            <form action="{{ route('cart.clear') }}" method="POST">
                              @csrf
                              <button id="vaciar" class="btn btn-danger px-6 py-2 text-red-800 mt-3">Vaciar el carrito</button>
                            </form>
                          </div>

                          <div class="col-lg-8 col-md-7 col-sm-4">
                              <a href="/productos" class="btn btn-primary px-6 py-2 text-white mt-3">Comprar más</a>
                          </div>

                          <div class="col-lg-2 col-md-2 col-sm-4">
                            <form action="{{ route('pago') }}" method="GET">
                              @csrf
                              <input type="hidden" >
                              <button class="btn btn-primary px-6 py-2 text-white mt-3">Pagar</button>
                            </form>
                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
            </div>
          </main>
      @else
        <!-- OPCIÓN SI EL CARRITO ESTÁ VACIO -->
        <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-gray-200 col-lg-12 col-md-12 col-sm-12 shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <script>

                            alert("{{ session('success') }}")

                          </script>
                      @endif
                        <h3 class="text-3xl text-bold text-center">Carrito de la compra</h3>
                      <div class="flex-1">
                        
                      <section class="flex flex-col break-words bg-white sm:border-1 mt-5 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                        <header class="font-semibold bg-red-600 text-gray-700 px-6 py-6 rounded text-white text-center">
                            Todavía no hay productos en el carrito.
                        </header>
                      </section>

                        <div class="row mt-3">
                          <div class="col-lg-2 col-md-3 col-sm-4">
                            <form action="{{ route('cart.clear') }}" method="POST">
                              @csrf
                              <button id="vaciar" class="btn btn-danger px-6 py-2 text-red-800 mt-3" disabled>Vaciar el carrito</button>
                            </form>
                          </div>

                          <div class="col-lg-8 col-md-7 col-sm-4">
                              <a href="/productos" class="btn btn-primary px-6 py-2 text-white mt-3">Comprar</a>
                          </div>

                          <div class="col-lg-2 col-md-2 col-sm-4">
                            <form action="{{ route('processTransaction') }}" method="POST">
                              @csrf
                              <button class="btn btn-primary px-6 py-2 text-white mt-3" disabled>Pagar</button>
                            </form>
                          </div>
                          
                        </div>

                      </div>
                    </div>
                  </div>
            </div>
          </main>
      @endif
@endsection