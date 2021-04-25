<?php if (isset($_SESSION['id_jugadores'])): ?>
       
<nav class="navbar-laravel sticky-top navbar-expand-lg justify-content-center">
                            <button class="navbar-toggler justify-content-center" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                            <ul class="nav navbar-nav">
                                <li class="">
                                    <button id="navJugadores" class="botonNavHeader">
                                        <?php  
                                        ControladorVistas::vistaNavesAdminesJugadorJugadores();
                                        
                                        ?>
                                    </button>
                                </li>
                                    
                                <li class="">
                                    <button id="navPersonajes" class="botonNavHeader">
                                    <?php  
                                         ControladorVistas::vistaNavesAdminesJugadorPersonajes();
                                    ?>
                                    </button>
                                </li>
                                <li class="">
                                    <button id="navAnecdotas" class="botonNavHeader">
                                        <?php  
                                         ControladorVistas::vistaNavesAdminesJugadorAnecdotas();
                                
                                        ?>
                                    </button>
                                </li>
                       <!--  AQUÍ PONDRÁ ADMIN O JUGADOR EN FUNCIÓN DE QUIÉN HAYA INICIADO SESIÓN      -->
                       
                                <li class="d-flex" >
                                     <button class="botonNavSinHover" style="margin-left: 230px; cursor: auto;">
                                        <?php  if($_SESSION['sess_user'] == "admin") : ?>
                                            <b>&nbsp;Administrador <?php echo $_SESSION['sess_user']; ?></b>
                                        <?php endif; ?>
                                        <?php  if(!($_SESSION['sess_user'] == "admin")) : ?>
                                            &nbsp;Jugador <?php echo $_SESSION['sess_user']; 
                                                    if(isset( $_SESSION['nombrePersonajeSelecionado'])){
                                                            echo ", escribiendo como: <i>".$_SESSION['nombrePersonajeSelecionado']."</i>";
                                                    }  ?>
                                                    
                                            <?php endif; ?>
                                       </button>      
                                </li>
                        
                            </ul>
                    </div>
</nav>

<?php endif; ?>
