<?php 
   require_once 'controller/ControladorVistas.php';
   require_once 'controller/ControladorPersonajes.php';
   require_once "model/modeloBase.php" ;
   require_once "model/jugadores.php" ;
   require_once "model/perfiles.php" ;
   session_start();
   $mvc = new ControladorVistas();
   $mvc->redirigirIndexSinoInicioSesion();
   $ControladorPersonajes = new ControladorPersonajes();
   $ControladorPersonajes::formularioCreacionPersonaje();
   $ControladorPersonajes::formularioComenzarAescribirAnecdotasConPersonaje();
    // include "model/modeloBase.php" ;
    // include "model/personajes.php" ;
    // $personajes = new Personaje ("personajes");
    // $tablaPersonajes = $personajes->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "css/headLinksMeta.html"; ?> 

</head>
<body>
    <?php include "headerAPLICACION.php"; ?>

<div id="wrap">
  <div id="main" class="container clear-top">

    <?php $ControladorPersonajes::borrarPersonaje(); ?>

        <main id="containerPrincipal" class="container">
                
                <!-- 
                AQUÍ PONDRÁ ADMIN O JUGADOR EN FUNCIÓN DE QUIÉN HAYA INICIADO SESIÓN      -->
                <p class="h1 text-center separador"> 
                <?php  
                
                if(isset( $_SESSION['sess_user'])){
                        echo "JUGADOR: ". $_SESSION['sess_user'];
                    }
                        ?> 
                </p>  

                <!--  PARA QUE APAREZCAN LOS DATOS DE LOS PERSONAJES O EL FORMULARIO DE CREACIÓN DE PERSONAJE   -->
                <!--  LOS DATOS DE LA BBDD SOBRE LOS PERSONAJES   -->
                <?php $ControladorPersonajes::comprobarSiHayPersonajes(); ?> 
        
        </main>
</div>
  </div>
  <!-- BOTÓN SUBIR ARRIBA -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

<?php include (FOOTER_PATH."footer.html"); ?>  

<!--  BOTONES MOSTRAR / OCULTAR LA TABLA DE LOS DATOS  -->
<?php include "jquery/jqueryPersonajes.html" ?>
<?php include "jquery/jqueryEliminarDefinitivamente.html" ?>

</body>
</html>
