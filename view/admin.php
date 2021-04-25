<?php
     include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');

     require_once (CONTROLLER_PATH."ControladorVistas.php");
    
     session_start();
     $mvc = new ControladorVistas();
     $mvc->redirigirIndexSinoEsAdmin();
     require_once (CONTROLLER_PATH."controladorAdministrador.php");
     require_once (MODEL_PATH."modeloBase.php");
     require_once (MODEL_PATH."jugadores.php");
     require_once (MODEL_PATH."personajes.php");
     require_once (MODEL_PATH."anecdotas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php  include (CSS_PATH."headLinksMeta.html");  ?> 

</head>
<body>
      <?php include (HEADER_PATH."headerAPLICACION.php"); ?>
      <?php include (NAV_PATH."nav.php") ; ?>
      <?php ControladorAdministrador::borrarJugador();     ?>
      <?php ControladorAdministrador::borrarPersonaje();     ?>
      <?php ControladorAdministrador::borrarAnecdota();     ?>

    <!-- ESTO LO PONGO AQUÍ PARA QUE APAREZCA EL FORMULARIO DE BORRAR DEFINITIVAMENTE ARRIBA DEL CONTAINER PRINCIPAL  -->
<div id="wrap">
  <div id="main" class="container clear-top">  
     
      

      <main id="containerPrincipal" class="container">
        

            <p class="h1 text-center separador">
                <?php  
                   
                  echo "<br>";  
                  echo  $_SESSION['sess_user'];
                ?> 
            </p>
            <!--  LOS DATOS DE LA BBDD SOBRE LOS JUGADORES   -->
            <?php ControladorAdministrador::controladorVistasAdmin();     ?>
               
            </div>
      </main>
  </div>
</div>
<!-- BOTÓN SUBIR ARRIBA -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

<?php include (FOOTER_PATH."footer.html"); ?>   

<!--  BOTONES MOSTRAR / OCULTAR LA TABLA DE LOS DATOS  -->
<?php include (JQUERY_PATH."jqueryAccionEditarEliminar.html"); ?> 
<?php include (JQUERY_PATH."jqueryAdmin.html"); ?> 


    
</body>
</html>
