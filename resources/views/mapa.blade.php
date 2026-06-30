@include('complementos.header')


<style>
  /* Estilo base del enlace */
  .leaflet-container a {
    color: white;
  }

</style>

<div class="wrapper" style="background-color: #CCCACA;">
    <div class="main-card">
        
        <aside class="sidebar-left">
            <h6 class="fw-bold text-white mb-4"><i class="bi bi-funnel-fill text-danger me-2"></i>FILTRAR</h6>
            <form id="filtroForm">
                <div class="mb-4">
                    <label class="form-label small fw-bold text-white">MUNICIPIO</label>
                    <select name="municipio" class="form-select border-0 bg-light shadow-none py-2 auto-filter">
                        <option value="La Virginia" {{ request('municipio') == 'La Virginia' ? 'selected' : '' }}>La Virginia</option>
                        <option value="Dosquebradas" {{ request('municipio') == 'Dosquebradas' ? 'selected' : '' }}>Dosquebradas</option>
                        <option value="Pereira" {{ request('municipio') == 'Pereira' ? 'selected' : '' }}>Pereira</option>

                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold text-white">DEPORTES</label>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="Futbol" type="checkbox" id="f-fut"
                        {{ is_array(request('deporte')) && in_array('Futbol', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-fut">Fútbol</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="Tennis" type="checkbox" id="f-ten"
                        {{ is_array(request('deporte')) && in_array('Tennis', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-ten">Tennis</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="Baloncesto" type="checkbox" id="f-bal"
                        {{ is_array(request('deporte')) && in_array('Baloncesto', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-ten">Baloncesto</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="Patinaje" type="checkbox" id="f-bal"
                        {{ is_array(request('deporte')) && in_array('Patinaje', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-ten">Patinaje</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="Atletismo" type="checkbox" id="f-bal"
                        {{ is_array(request('deporte')) && in_array('Atletismo', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-ten">Atletismo</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="BMX" type="checkbox" id="f-bal"
                        {{ is_array(request('deporte')) && in_array('BMX', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-ten">BMX</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="Polideportivo" type="checkbox" id="f-bal"
                        {{ is_array(request('deporte')) && in_array('Polideportivo', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-ten">Polideportivo</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="Estadio" type="checkbox" id="f-bal"
                        {{ is_array(request('deporte')) && in_array('Estadio', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-ten">Estadio</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input auto-filter" name="deporte[]" value="Gimnacio" type="checkbox" id="f-bal"
                        {{ is_array(request('deporte')) && in_array('Gimnacio', request('deporte')) ? 'checked' : '' }}>
                        <label class="form-check-label text-white fw-semibold" for="f-ten">Gimnacio</label>
                    </div>
                </div>
            </form>
        </aside>

        <main class="map-section">
            <div id="map"></div>
        </main>
    </div>
</div>

@include('complementos.footer')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inicialización base
    var map = L.map('map', { zoomControl: false }).setView([4.8133, -75.6961], 13);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB'
    }).addTo(map);
    
    var markerGroup = L.featureGroup().addTo(map);
    var redIcon = L.divIcon({
        html: '<i class="bi bi-geo-alt-fill" style="color: #e63946; font-size: 30px;"></i>',
        className: 'custom-div-icon',
        iconSize: [30, 42], iconAnchor: [15, 42], popupAnchor: [0, -40]
    });

    // 2. FUNCIÓN PARA CARGAR DATOS SIN RECARGAR PÁGINA
    function filtrarEscenarios() {
        const form = document.getElementById('filtroForm');
        const formData = new FormData(form);
        const params = new URLSearchParams(formData).toString();

        fetch(`/api/escenarios?${params}`)
            .then(response => response.json())
            .then(data => {
                console.log("Datos recibidos:", data);
                markerGroup.clearLayers();

                if (data.length === 0) {
                    Swal.fire({
                        title: 'Sin resultados',
                        text: 'No se encontraron escenarios deportivos con las características seleccionadas.',
                        icon: 'warning',
                        confirmButtonColor: '#e63946', 
                        confirmButtonText: 'Entendido'
                    });
                    return;
                }

                data.forEach(escenario => {
                    if (escenario.latitud && escenario.longitud) {
                        const urlDetalle = `/escenario/${escenario.id_escenario}`;
                        L.marker([escenario.latitud, escenario.longitud], {icon: redIcon})
                            .addTo(markerGroup)
                            .bindPopup(`
                            
                                <div style="padding: 10px; width: 200px;">
                                    <img class="sc-img rounded" src="storage/${escenario.imagen}" alt="">
                                    <h6 class="pt-2" style="font-weight: 800; margin: 0 0 5px 0;">${escenario.nombre_escenario}</h6>
                                    <p style="font-size: 11px; color: #666; margin-bottom: 8px;">${escenario.descripcion}</p>
                                    <p style="font-size: 10px; font-weight: bold; color: #e63946; margin-bottom: 5px;">${escenario.deporte} - ${escenario.municipio}</p>
                                    <a href="${urlDetalle}" class="btn btn-danger btn-sm w-100">
                                        Ver más
                                    </a>
                                </div>
                            
                            `);
                    }
                });

                if (markerGroup.getBounds().isValid()) {
                    map.flyToBounds(markerGroup.getBounds(), { padding: [50, 50], duration: 1.5 });
                }
            })
            .catch(error => console.error('Error cargando escenarios:', error));
    }

    // 3. ESCUCHAR CAMBIOS EN FILTROS
    document.querySelectorAll('.auto-filter').forEach(item => {
        item.addEventListener('change', function() {
            filtrarEscenarios();
        });
    });

    // Carga inicial al entrar a la página
    filtrarEscenarios();
});
</script>


<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script>
    function openNav() {
    document.getElementById("mySidepanel").style.width = "250px";
    }
         
    function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
    }
</script>

</body>
</html>