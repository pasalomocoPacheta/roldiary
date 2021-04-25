<header id="header" class="menus-background navbar navbar-expand-lg">
    <div id="titulo" class="container links-color cerrarFormulariosyEfectoBlur">
    <?php                         
     if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
        echo "<a href='admin.php'> <img class='img-title' src='view/img/logoFINAL.png' > ROLDIARY</a> ";
    } else{
       echo "<a href='index.php'> <img class='img-title' src='view/img/logoFINALpequenio.png' > ROLDIARY</a> ";
    } 
    ?>       

    </div>

  

    <?php 
        if(isset($_SESSION['id_jugadores'])){
            echo "
                <span class='navbar-brand text-right'> 
                    <button class='botonNavHeader' style='cursor:auto;'>
                        <a href='index.php?cerrar=sesion'> <i style='font-size: xx-large;' class='fas fa-sign-out-alt'></i>&nbsp;SALIR</a>
                    </button>
                </span>";
        }else{
            echo "
            <span class='navbar-brand text-right'> 
                    <button class='botonNavHeader entrar'> <i class='fas fa-sign-in-alt'></i> Entrar </button> 
                    <button class='botonNavHeader registrar'>Registrarse</button>
            </span>";
        }
    ?>    
    

</header>
