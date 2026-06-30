    <!-- Modal Añadir Escenarios -->
       <div class="modal fade" id="modalCrearEscenario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header bg-danger text-white">
                     <h5 class="modal-title w-100 text-center" id="exampleModalLabel"><b>Registrar Nuevo Escenario Deportivo</b></h5>
                     <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('escenarios.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="modal-body">
                        <div class="row">
                              <div class="col-md-12 mb-3">
                                 <label class="form-label d-block text-center" text-align: center; >Nombre del Escenario</label>
                                 <input type="text" name="nombre_escenario" class="form-control" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Municipio</label>
                                 <select name="municipio" class="form-select" required>
                                    <option value="Pereira">Pereira</option>
                                    <option value="Dosquebradas">Dosquebradas</option>
                                    <option value="La Virginia">La Virginia</option>
                                 </select>
                              </div>

                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Dirección</label>
                                 <input type="text" name="direccion" class="form-control" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Deporte</label>
                                 <select name="deporte" class="form-select">
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
                                 <input type="number" step="any" name="latitud" class="form-control" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Longitud</label>
                                 <input type="number" step="any" name="longitud" class="form-control" required>
                              </div>

                              <div class="col-md-4 mb-3">
                                 <label class="form-label">Capacidad</label>
                                 <input type="number" name="capacidad" class="form-control" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Iluminación</label>
                                 <select name="iluminacion" class="form-select">
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                 </select>
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label class="form-label">Tipo de Suelo</label>
                                 <input type="text" name="suelo" class="form-control" placeholder="Ej: Madera, Cemento">
                              </div>

                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Estado</label>
                                 <select name="estado" class="form-select">
                                    <option value="Excelente">Bueno</option>
                                    <option value="Bueno">Regular</option>
                                    <option value="Mantenimiento">Malo</option>
                                    <option value="Mantenimiento">En Mantenimiento</option>
                                 </select>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="form-label">Baños</label>
                                 <select name="banos" class="form-select">
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                 </select>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <label class="form-label d-block text-center">Descripción</label>
                                 <textarea name="descripcion" class="form-control" rows="2"></textarea>
                              </div>

                              <div class="col-md-12 mb-3">
                                 <label class="form-label d-block text-center">Horarios de Atención</label>
                                 <textarea name="horarios" class="form-control" rows="2" placeholder="Ej: Lunes a Viernes 8am - 10pm" required></textarea>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <label class="form-label">Subir Foto del Escenario</label>
                                 <input type="file" name="imagen" class="form-control" accept="image/*">
                              </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar Escenario</button>
                     </div>
                  </form>
            </div>
         </div>
      </div>
        <!-- Footer-->
        <footer class="footer py-4 text-white" style="background-color: red; font-weight: bold;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start">Copyright &copy; ArenaGo 2026</div>
                    <div class="col-lg-6 text-lg-end">
                        <a class="link-dark text-decoration-none text-white me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none text-white" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer> 
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>
