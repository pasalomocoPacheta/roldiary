<?php 
    include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');
    require_once (CONTROLLER_PATH."ControladorVistas.php");
   session_start();
   $mvc = new ControladorVistas();
   $mvc->redirigirIndexSinoInicioSesion();
   require_once (MODEL_PATH."modeloBase.php");
   require_once (MODEL_PATH."jugadores.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php  include (CSS_PATH."headLinksMeta.html"); ?> 

</head>
<body>
<?php include (HEADER_PATH."headerAPLICACION.php"); ?> 
<?php include (NAV_PATH."nav.php") ; ?>

<div id="wrap">
  <div id="main" class="container clear-top">

        <main id="containerPrincipal" class="container">
                
                    <!-- AQUÍ PONDRÁ NARRADOR O JUGADOR EN FUNCIÓN DE QUIÉN HAYA INICIADO SESIÓN      -->
                    <p class="h1 text-center separador"> 
                            <?php  
                            
                            if(isset( $_SESSION['sess_user'])){
                                    echo "JUGADOR: ". $_SESSION['sess_user'];
                                }
                                    ?> 
                    </p>
                            
                            <!--  LOS DATOS DE LA BBDD SOBRE LOS JUGADORES   -->
                <?php include "tablas/tablaJugadores.php"; ?>     

        </main>
  </div>
</div>
<!-- BOTÓN SUBIR ARRIBA -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

<?php include (FOOTER_PATH."footer.html"); ?>  

<!--  BOTONES MOSTRAR / OCULTAR LA TABLA DE LOS DATOS  -->
<?php include (JQUERY_PATH."jqueryJugadores.html"); ?>
<?php include (JQUERY_PATH."jqueryMenuBreadcrums.html"); ?>

    
</body>
</html>
