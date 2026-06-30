@include('complementos.header')

        <!-- Portada-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading text-white">Bienvenido a <b>ArenaGo</b></div>
                <div class="masthead-heading text-uppercase text-white">Es un placer tenerte acá</div>
                <a class="btn btn-danger btn-xl text-uppercase" href="#services">Conocenos</a>
            </div>
        </header>

        <!-- Presentación de desarolladores-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Proposito</h2>
                    <h3 class="section-subheading text-muted">Diseñamos y desarrollamos un sitio web interactivo que permita a los ciudadanos consultar de manera fácil y organizada los escenarios deportivos disponibles en los diferentes municipios del departamento, así como los deportes que se practican en cada uno de ellos. El objetivo es fomentar el acceso a la información, promover la práctica deportiva, fortalecer la identidad cultural y apoyar la planificación de actividades recreativas y competitivas en la región.</h3>
                </div>
            </div>
        </section>

        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Deportes que encontrarás acá</h2>
                    <h3 class="section-subheading text-muted">Estos es algunos de los deportes que encontrarás en este sitio web</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Deporte 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <!-- Este parte del codigo es para usar un hover como boton de un futuro modal -->
                                <!-- <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div> -->
                                <img class="img-fluid" src="{{ asset('images/portfolio/patinaje_prueba.png') }}" alt="...">
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Patinaje</div>
                                <div class="portfolio-caption-subheading text-muted">Conoce más del deporte</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Deporte 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                              
                                <img class="img-fluid" src="{{ asset('images/portfolio/bmx_prueba.png') }}" alt="...">
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Bmx</div>
                                <div class="portfolio-caption-subheading text-muted">Deporte a dos ruedas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                
                                <img class="img-fluid" src="{{ asset('images/portfolio/tenis_prueba.png') }}" alt="...">
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Tenis</div>
                                <div class="portfolio-caption-subheading text-muted">Deporte de raqueta</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Portfolio item 4-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                              
                                <img class="img-fluid" src="{{ asset('images/portfolio/atletismo_prueba.png') }}" alt="...">
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Atletismo</div>
                                <div class="portfolio-caption-subheading text-muted">Branding</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <!-- Portfolio item 5-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                
                                <img class="img-fluid" src="{{ asset('images/portfolio/ajedrez_prueba.png') }}" alt="...">
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Juegos de mesa</div>
                                <div class="portfolio-caption-subheading text-muted">Website Design</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Portfolio item 6-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                
                                <img class="img-fluid" src="{{ asset('images/portfolio/futbol_prueba.png') }}" alt="...">
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Futbol</div>
                                <div class="portfolio-caption-subheading text-muted">Photography</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- EQUIPO DE DESARROLLO-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">desarrolladores del proyecto</h2>
                    <h3 class="section-subheading text-muted">Estos son los desarrolladores encargados de darle vida a este proyecto</h3>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('images/team/guapo1.jpg') }}" alt="...">
                            <h4>Oscar Valencia</h4>
                            <p class="text-muted">Desarollador</p>
                            
                            <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/oscar-julian-valencia-b8507b212/" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('images/team/guapo2.jpg') }}" alt="..." />
                            <h4>Gustavo Vergel</h4>
                            <p class="text-muted">Desarrollador</p>
                           
                            <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/gustavo-vergel-67915170/" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Estamos encantados de que ustedes hagan parte de este gran proyecto el cual beneficiará a toda la comunidad posible</p></div>
                </div>
            </div>
        </section>

        <!-- Modals-->
@include('complementos.footer')