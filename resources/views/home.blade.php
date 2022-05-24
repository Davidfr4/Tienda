@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        

        <div class="row mt-5">
		<div class="col">
			<div class="carousel slide carousel-fade bg-gray-200" id="mi-carousel" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active" data-bs-interval="3000">
                    <a href="/productos"><img class="img-fluid" src="/images/carrusel1.jpg"></a>
					</div>
					<div class="carousel-item" data-bs-interval="3000">
                    <a href="/productos"><img class="img-fluid" src="/images/carrusel2.jpg"></a>
					</div>
					<div class="carousel-item" data-bs-interval="3000">
                    <a href="/productos"><img class="img-fluid" src="/images/carrusel3.jpg"></a>
					</div>
                    <div class="carousel-item" data-bs-interval="3000">
						<a href="/productos"><img class="img-fluid" src="/images/carrusel4.jpg"></a>
					</div>
				</div>
				<!-- Controles -->
				<button 
					class="carousel-control-prev"
					type="button"
					data-bs-target="#mi-carousel"
					data-bs-slide="prev"
				>
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Anterior</span>
				</button>

				<button 
					class="carousel-control-next"
					type="button"
					data-bs-target="#mi-carousel"
					data-bs-slide="next"
				>
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Siguiente</span>
				</button>

				<!-- Indicadores -->
				<div class="carousel-indicators">
					<button 
						type="button"
						class="active"
						data-bs-target="#mi-carousel"
						data-bs-slide-to="0"
						aria-label="Slide 1"
					></button>
					<button 
						type="button"
						class=""
						data-bs-target="#mi-carousel"
						data-bs-slide-to="1"
						aria-label="Slide 2"
					></button>
					<button 
						type="button"
						class=""
						data-bs-target="#mi-carousel"
						data-bs-slide-to="2"
						aria-label="Slide 3"
					></button>
                    <button 
						type="button"
						class=""
						data-bs-target="#mi-carousel"
						data-bs-slide-to="3"
						aria-label="Slide 4"
					></button>
				</div>

			</div>
		</div>
	</div>    

        
    </div>
</main>
@endsection
