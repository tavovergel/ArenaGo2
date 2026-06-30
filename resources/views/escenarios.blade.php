@include('complementos.header')
      
    <!-- about section -->
      @if($escenarioAleatorio)
       <section class="container mt-3">
         <div class="container d-flex justify-content-center">
            <div class="card shadow-lg border-0 overflow-hidden" style="max-width: 1100px; width: 100%;">
               <div class="row g-0">  
                  <div class="col-md-6">
                  <div class="h-100">
                     <img src="{{ $escenarioAleatorio->imagen }}" 
                           class="img-fluid h-100 object-fit-cover" 
                           alt="Canchas Banquitas"
                           style="min-height: 400px;"> </div>
                  </div>
                  <div class="col-md-6 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5">
                     <h2 class="card-title display-5 h1 fw-bold text-dark mb-4">{{ $escenarioAleatorio->nombre_escenario }}</h2>
                     <p class="card-text text-muted mb-5 fs-5" style="line-height: 1.6;">
                        {{ $escenarioAleatorio->descripcion }}
                     </p>  
                     <a href="escenario/{{ $escenarioAleatorio->id_escenario }}" class="btn btn-danger btn-lg px-5 py-3 rounded-3 shadow-sm fw-bold">
                        Ver más
                     </a>
                  </div>
                  </div>  
               </div>
            </div>
         </div>
       </section>
       @else
        <div class="card-body">
            <p>No hay escenarios para recomendarte</p>
        </div>
      @endif

   

      <section class="container">
         <form action="{{ route('escenarios.index') }}" method="GET" class="row g-2 align-items-center bg-light p-3 rounded shadow-sm mb-4">
    
    <div class="col-md-3">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar escenario..." value="{{ request('buscar') }}">
    </div>

    <div class="col-md-2">
        <select name="municipio" class="form-select">
            <option value="">Municipio</option>
            <option value="Pereira" {{ request('municipio') == 'Pereira' ? 'selected' : '' }}>Pereira</option>
            <option value="Dosquebradas" {{ request('municipio') == 'Dosquebradas' ? 'selected' : '' }}>Dosquebradas</option>
            <option value="La Virginia" {{ request('municipio') == 'La Virginia' ? 'selected' : '' }}>La Virginia</option>
        </select>
    </div>

    <div class="col-md-2">
        <select name="deporte" class="form-select">
            <option value="">Deporte</option>
            <option value="Futbol" {{ request('deporte') == 'Futbol' ? 'selected' : '' }}>Fútbol</option>
            <option value="Baloncesto" {{ request('deporte') == 'Baloncesto' ? 'selected' : '' }}>Baloncesto</option>
            <option value="Tennis" {{ request('deporte') == 'Tennis' ? 'selected' : '' }}>Tennis</option>
            <option value="Atletismo" {{ request('deporte') == 'Atletismo' ? 'selected' : '' }}>Atletismo</option>
            <option value="Patinaje" {{ request('deporte') == 'Patinaje' ? 'selected' : '' }}>Patinaje</option>
            <option value="BMX" {{ request('deporte') == 'BMX' ? 'selected' : '' }}>BMX</option>
            <option value="Polideportivo" {{ request('deporte') == 'Polideportivo' ? 'selected' : '' }}>Polideportivo</option>
            <option value="Estadio" {{ request('deporte') == 'Estadio' ? 'selected' : '' }}>Estadio</option>
            <option value="Gimnacio" {{ request('deporte') == 'Gimnacio' ? 'selected' : '' }}>Gimnacio</option>
        </select>
    </div>

    <div class="col-md-2">
        <select name="estado" class="form-select">
            <option value="">Estado</option>
            <option value="Excelente" {{ request('estado') == 'Excelente' ? 'selected' : '' }}>Excelente</option>
            <option value="Bueno" {{ request('estado') == 'Bueno' ? 'selected' : '' }}>Bueno</option>
            <option value="Regular" {{ request('estado') == 'Regular' ? 'selected' : '' }}>Regular</option>
        </select>
    </div>

    <div class="col-md-3 d-flex gap-2">
        <button type="submit" class="btn btn-danger w-100 text-white">Buscar</button>
        <a href="{{ route('escenarios.index') }}" class="btn btn-secondary text-white">Limpiar</a>
        <button type="submit" class="btn btn-danger w-100 text-white disabled">{{ $escenarios->count() }}</button>
    </div>
   </form>
         <div class="container mb-5 mt-5">
            @if($escenarios->isEmpty())
               <div class="alert alert-info">No hay escenarios con esas caracteristicas.</div>
            @endif
            @if(session('success'))
               <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert" style="border-left: 5px solid #198754 !important;">
                  <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                        <div>
                           <strong>¡Excelente!</strong> {{ session('success') }}
                        </div>
                  </div>
                  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                  </ul>
               </div>
            @endif
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
               @foreach($escenarios as $escenario)
               <div class="col">
                  <div class="card h-100 shadow-sm border-0 overflow-hidden" style="border-radius: 15px;">
                  <div style="height: 160px; overflow: hidden;">
                     @if($escenario->imagen)
                        <img src="{{ asset('storage/' . $escenario->imagen) }}" class="card-img-top h-100 object-fit-cover" alt="">
                     @else
                        <img src="images/canchab.jpg" class="card-img-top h-100 object-fit-cover" alt="Coliseo El Salitre">
                     @endif
                  </div>
                  <div class="card-body p-4 d-flex flex-column">
                     <h5 class="card-title fw-bold text-dark mb-2 fs-6">{{ $escenario->nombre_escenario }}</h5>
                     <p class="card-text text-muted mb-4 small flex-grow-1">
                        {{ $escenario->direccion }}
                     </p>
                     <a href="{{ route('escenarios.show', $escenario) }}" class="btn btn-danger w-100 py-2 fw-bold rounded-3 m-1">
                        Ver más
                     </a>
                 
                  </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
   
      
     
@include('complementos.footer')   