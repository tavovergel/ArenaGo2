  <style>
    :root {
      --brand-red:   #E8112D;
      --brand-dark:  #111111;
      --brand-gray:  #f5f5f5;
      --brand-blue:  #1A6FC4;
    }

    body {
      font-family: 'Barlow', sans-serif;
      background: #fff;
      color: var(--brand-dark);
    }

    /* ── NAVBAR ── */
    .navbar-brand-text {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2rem;
      color: var(--brand-dark);
      letter-spacing: 1px;
    }
    .navbar-brand-text span { color: var(--brand-red); }
    .nav-link {
      font-weight: 600;
      font-size: .85rem;
      letter-spacing: .08em;
      text-transform: uppercase;
      color:white !important;
    }
    .nav-link:hover { color: var(--brand-red) !important; }

    /* ── HERO BANNER ── */
    .hero-banner {
      background: var(--brand-red);
      padding: 1.25rem 0;
    }
    .hero-banner h1 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(2.2rem, 5vw, 3.5rem);
      color: #fff;
      letter-spacing: .12em;
      margin: 0;
    }

    /* ── BACK LINK ── */
    .back-link {
      color: var(--brand-blue);
      font-weight: 600;
      font-size: .9rem;
      text-decoration: none;
    }
    .back-link:hover { text-decoration: underline; }

    /* ── COURT IMAGE ── */
    .court-img {
      width: 100%;
      height: 280px;
      object-fit: cover;
      border-radius: .5rem;
    }

    /* ── TITLE ── */
    .venue-title {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(1.8rem, 4vw, 2.8rem);
      letter-spacing: .05em;
      line-height: 1.1;
    }
    .venue-subtitle {
      color: #555;
      font-size: .9rem;
      font-weight: 500;
    }

    /* ── CARDS ── */
    .info-card {
      border: 1px solid #e0e0e0;
      border-radius: .6rem;
      padding: 1.1rem 1.25rem;
      margin-bottom: 1rem;
      background: #fff;
    }
    .info-card h6 {
      font-weight: 700;
      font-size: .8rem;
      text-transform: uppercase;
      letter-spacing: .08em;
      color: #333;
      margin-bottom: .75rem;
    }

    /* Características badges */
    .feature-badge {
      display: inline-flex;
      align-items: center;
      gap: .35rem;
      background: var(--brand-gray);
      border-radius: 2rem;
      padding: .3rem .75rem;
      font-size: .8rem;
      font-weight: 600;
      margin-right: .4rem;
      margin-bottom: .4rem;
    }
    .feature-badge i { font-size: .95rem; color: #555; }

    /* Status pill */
    .status-good {
      color: #1a8c4e;
      font-weight: 700;
      font-size: .9rem;
    }
    .status-good i { color: #1a8c4e; }

    /* Horarios */
    .schedule-row {
      display: flex;
      align-items: center;
      gap: .5rem;
      font-size: .9rem;
    }
    .schedule-row .badge-day {
      background: var(--brand-dark);
      color: #fff;
      border-radius: .25rem;
      padding: .2rem .5rem;
      font-size: .75rem;
      font-weight: 600;
    }
    .schedule-row .badge-hours {
      background: var(--brand-gray);
      border-radius: .25rem;
      padding: .2rem .6rem;
      font-size: .8rem;
      font-weight: 600;
    }

    /* Reservación */
    .no-reserva {
      color: var(--brand-blue);
      font-weight: 700;
      font-size: .9rem;
    }

    /* Rating */
    .rating-score {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 3rem;
      line-height: 1;
      color: var(--brand-dark);
    }
    .stars-fill { color: #F5A623; }

    /* Reviews */
    .review-item {
      border-top: 1px solid #eee;
      padding: .75rem 0;
    }
    .review-avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
      background: #ccc;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: .9rem;
      color: #fff;
      flex-shrink: 0;
    }
    .avatar-alejandro { background: #5b7bbd; }
    .avatar-erika     { background: #bd5b7b; }

    .review-name  { font-weight: 700; font-size: .85rem; }
    .review-text  { font-size: .82rem; color: #444; }

    /* Write review button */
    .btn-review {
      background: var(--brand-red);
      color: #fff;
      border: none;
      border-radius: .35rem;
      font-weight: 700;
      font-size: .85rem;
      letter-spacing: .05em;
      padding: .6rem 1.25rem;
      width: 100%;
      transition: background .2s;
    }
    .btn-review:hover { background: #c00020; color: #fff; }

    /* ── FOOTER CREDITS ── */
    .footer-credits {
      background: var(--brand-dark);
      color: #fff;
      padding: 1.5rem 0;
    }
    .footer-credits .credit-name {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.6rem;
      letter-spacing: .1em;
      text-align: center;
    }
  </style>

@include('complementos.header')



<body>
  <!-- ── MAIN CONTENT ── -->
  <div class="container py-4">

    <div class="row g-4">

      <!-- LEFT COLUMN -->
      <div class="col-lg-6">

        <!-- Venue title -->
        <h2 class="venue-title mb-1">{{ $escenario->nombre_escenario }}</h2>


        <!-- Court image -->
        <img
          src="Gemini_Generated_Image_penabypenabypena.png"
          alt="Cancha de Básquet Las Palmeras"
          class="court-img mb-4 mt-3"
          onerror="this.src='{{ asset('storage/' . $escenario->imagen) }}'; this.onerror=null;"
        />

        <!-- General info -->
        <h5 class="fw-bold mb-2">Información General:</h5>
        <p class="text-muted" style="font-size:.92rem; line-height:1.6;">{{ $escenario->descripcion }}</p>
      </div>

      <!-- RIGHT COLUMN -->
      <div class="col-lg-6">

          @if(session('exito'))
              <div class="container mt-3">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>¡Logrado!</strong> {{ session('exito') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              </div>
          @endif

        <!-- Características -->
        <div class="info-card">
          <h6><i class="bi bi-geo-alt-fill me-1" style="color:var(--brand-red)"></i>Características del lugar</h6>
          <span class="feature-badge"><i class=""></i>{{ $escenario->deporte }}</span>
          <span class="feature-badge"><i class=""></i>{{ $escenario->capacidad }} Personas</span>
          <span class="feature-badge"><i class=""></i> {{ $escenario->municipio }}</span>
          <span class="feature-badge"><i class=""></i> {{ $escenario->direccion }}</span>
        </div>

        <!-- Infraestructura -->
        <div class="info-card">
          <h6><i class="bi bi-hammer me-1" style="color:var(--brand-red)"></i>Condiciones de Infraestructura</h6>
          <span class="feature-badge"><i class=""></i>Iluminación: {{ $escenario->iluminacion }}</span>
          <span class="feature-badge"><i class=""></i>Tipo de Suelo: {{ $escenario->suelo }}</span>
          <span class="feature-badge"><i class=""></i>Baños: {{ $escenario->banos }}</span>
        </div>

        <!-- Horarios -->
        <div class="info-card">
          <h6><i class="bi bi-clock me-1" style="color:var(--brand-red)"></i>Horarios</h6>
          <div class="schedule-row">
            <i class="bi bi-calendar-check text-primary"></i>
            <span class="badge-day">{{ $escenario->horarios}}</span>
          </div>
        </div>
        <!-- Fecha Registros -->
        <div class="info-card">
          <h6><i class="bi bi-clock me-1" style="color:var(--brand-red)"></i>Fechas</h6>
          <div class="schedule-row">
            <i class="bi bi-clock text-primary"></i> Creado: 
            <span class="badge-day">{{ $escenario->created_at}}</span>
            <i class="bi bi-clock text-primary"></i> Actualizado: 
            <span class="badge-day">{{ $escenario->updated_at}}</span>
          </div>
        </div>
        @auth
          <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalEditar"><b>Editar Escenario</b></button>
          <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalEliminar"><b>Eliminar Escenario</b></button>            
        @endauth
        
      </div><!-- /right col -->
    </div><!-- /row -->
  </div><!-- /container -->


<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalEditarLabel">Modificar Datos del Escenario</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{ route('escenarios.update', $escenario->id_escenario) }}" method="POST">
                @csrf
                @method('PUT') <div class="modal-body">
                <div class="row">
                              <div class="col-md-12 mb-3">
                                 <label class="form-label d-block text-center" text-align: center; >Nombre del Escenario</label>
                                 <input type="text" name="nombre_escenario" value="{{ $escenario->nombre_escenario }}" class="form-control" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Municipio</label>
                                 <select name="municipio" class="form-select">
                                    <option value="{{ $escenario->municipio }}">{{ $escenario->municipio }}</option>
                                    <option value="Pereira">Pereira</option>
                                    <option value="Dosquebradas">Dosquebradas</option>
                                    <option value="La Virginia">La Virginia</option>
                                 </select>
                              </div>

                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Dirección</label>
                                 <input type="text" name="direccion" value="{{ $escenario->direccion }}" class="form-control">
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Deporte</label>
                                 <select name="deporte" class="form-select">
                                    <option value="{{ $escenario->deporte }}">{{ $escenario->deporte }}</option>
                                    <option value="Futbol">Futbol</option>
                                    <option value="Baloncesto">Baloncesto</option>
                                    <option value="Tennis">Tennis</option>
                                    <option value="Atletismo">Atletismo</option>
                                    <option value="Patinaje">Patinaje</option>
                                    <option value="Bmx">Bmx</option>
                                    <option value="Polideportivo">Polideportivo</option>
                                    <option value="Estadio">Estadio</option>
                                    <option value="Gimnacio">Gimnacio</option>
                                 </select>
                              </div>

                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Latitud</label>
                                 <input type="number" step="any" value="{{ $escenario->latitud }}" name="latitud" class="form-control">
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Longitud</label>
                                 <input type="number" step="any" name="longitud" value="{{ $escenario->longitud }}" class="form-control">
                              </div>

                              <div class="col-md-4 mb-3">
                                 <label class="form-label">Capacidad</label>
                                 <input type="number" name="capacidad" value="{{ $escenario->capacidad }}" class="form-control">
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Iluminación</label>
                                 <select name="iluminacion" class="form-select">
                                    <option value="{{ $escenario->iluminacion }}">{{ $escenario->iluminacion }}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                 </select>
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label class="form-label">Tipo de Suelo</label>
                                 <input type="text" name="suelo" class="form-control" value="{{ $escenario->suelo }}" placeholder="Ej: Madera, Cemento">
                              </div>

                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Estado</label>
                                 <select name="estado" class="form-select">
                                  <option value="{{ $escenario->estado }}">{{ $escenario->estado }}</option>
                                    <option value="Excelente">Bueno</option>
                                    <option value="Bueno">Regular</option>
                                    <option value="Mantenimiento">Malo</option>
                                    <option value="Mantenimiento">En Mantenimiento</option>
                                 </select>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Baños</label>
                                 <select name="banos" class="form-select">
                                    <option value="{{ $escenario->banos }}">{{ $escenario->banos }}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                 </select>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <label class="form-label d-block text-center">Descripción</label>
                                 <textarea name="descripcion" value="{{ $escenario->descripcion }}" class="form-control" rows="2">{{ $escenario->descripcion }}</textarea>
                              </div>

                              <div class="col-md-12 mb-3">
                                 <label class="form-label d-block text-center">Horarios de Atención</label>
                                 <textarea name="horarios" class="form-control" value="{{ $escenario->horarios }}" rows="2">{{ $escenario->horarios }}</textarea>
                              </div>
                        </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalEliminarLabel">¿Confirmar Eliminación?</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <p>¿Estás completamente seguro de que deseas eliminar permanentemente el escenario <strong>{{ $escenario->nombre_escenario }}</strong>?</p>
                <p class="text-muted"><small>Esta acción no se puede deshacer y el registro se borrará de la base de datos MySQL.</small></p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <form action="{{ route('escenarios.destroy', $escenario->id_escenario) }}" method="POST">
                    @csrf
                    @method('DELETE') <button type="submit" class="btn btn-danger">Sí, Eliminar Registro</button>
                </form>
            </div>
        </div>
    </div>
</div>


  @include('complementos.footer')   