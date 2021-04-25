<header id="header" class="cerrarFormulariosyEfectoBlur menus-background navbar sticky-top navbar-expand-lg">
    <div id="titulo" class="container links-color">
    <?php                         
     if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
        echo "<a href='admin.php'> <img class='img-title' src='view/img/logoFINAL.png' > ROLDIARY</a> ";
    } else{
       echo "<a href='index.php'> <img class='img-title' src='view/img/logoFINAL.png' > ROLDIARY</a> ";
    } 
    ?>       
        
    </div>
    <?php if (isset($_SESSION['id_jugadores'])): ?>
    <span style="font-size:x-large;"><?php echo $_SESSION['sess_user']; ?></span>
    <span class="navbar-brand text-cener"> 
        <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button>
                                <?php  
                                
                                if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
                                    echo "<a id='controladorPersonajes' class='nav-link'>PERSONAJES</a>";
                                    } else{
                                    echo "<a class='nav-link' href='personajes.php'>PERSONAJES</a>";
                                    } 
                                ?>
                            </button>
                        </li>
                            
                        <li class="nav-item">
                            <button>
                            <?php  
                                if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
                                    echo "<a id='controladorJugadores' class='nav-link'>JUGADORES</a>";
                                } else{
                                    echo "<a class='nav-link' href='jugadores.php'>JUGADORES</a>";
                                } 
                            ?>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button>
                                <?php  
                                
                                if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
                                    echo "<a id='controladorAnecdotas' class='nav-link'>ANÉCDOTAS</a>";
                                    } else{
                                    echo "<a class='nav-link' href='anecdotas.php'>ANÉCDOTAS</a>";
                                    } 
                                ?>
                            </button>
                        </li>
                
                    </ul>
                    </div>
            </nav>
    </span>
    <?php endif; ?>
    <?php 
        if(isset($_SESSION['id_jugadores'])){
            echo "
                <span class='navbar-brand text-right'> 
                    <button style='cursor:auto;'>
                    <a href='index.php?cerrar=sesion'> <img src='view/img/logout_icon.png' >SALIR</a>
                    </button>
                </span>";
        }else{
            echo "
            <span class='navbar-brand text-right'> 
                    <button id='entrar'> Entrar </button> 
                    <button id='registrar'>Registrarse</button>
            </span>";
        }
    ?>    
    
</header>