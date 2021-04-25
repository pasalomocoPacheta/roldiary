<?php 

    include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');
    require_once (CONTROLLER_PATH."ControladorVistas.php");
    require_once (CONTROLLER_PATH."ControladorAnecdotas.php");
    require_once (CONTROLLER_PATH."ControladorPersonajes.php");
    require_once (MODEL_PATH."modeloBase.php");
    require_once (MODEL_PATH."personajes.php");
    require_once (MODEL_PATH."anecdotas.php");
    require_once (MODEL_PATH."jugadores.php");

   session_start();
   $mvc = new ControladorVistas();
   $mvc->redirigirIndexSinoInicioSesion();
   $ControladorAnecdotas = new ControladorAnecdotas();
   $ControladorAnecdotas::formularioCreacionAnecdota();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include (CSS_PATH."headLinksMeta.html"); ?> 

</head>
<body>
    <?php include (HEADER_PATH."headerAPLICACION.php"); ?>
    <?php include (NAV_PATH."nav.php") ; ?> 
    <?php $ControladorAnecdotas::borrarAnecdota(); ?>
    <?php $ControladorAnecdotas::clickEditarContenidoAnecdota(); ?>
    <?php $ControladorAnecdotas::clickEditarCampaniaAnecdota(); ?>
    <?php $ControladorAnecdotas::formularioEditarContenidoAnecdota(); ?>
    <?php $ControladorAnecdotas::formularioEditarCampaniaAnecdota(); ?>


<div id="wrap">
  <div id="main" class="container clear-top">  

        <main id="containerPrincipal" class="container">
         
       
        
            <!--  PARA QUE APAREZCAN LOS DATOS DE LOS PERSONAJES O EL FORMULARIO DE CREACIÓN DE PERSONAJE   -->
            <!--  LOS DATOS DE LA BBDD SOBRE LOS PERSONAJES   -->
            <?php $ControladorAnecdotas::comprobarSiHayAnecdotas(); ?>    
        </main>
  </div>
</div>
<!-- BOTÓN SUBIR ARRIBA -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

<?php include (FOOTER_PATH."footer.html"); ?>  

<!--  BOTONES MOSTRAR / OCULTAR LA TABLA DE LOS DATOS  -->
<?php include (JQUERY_PATH."jqueryAnecdotas.html"); ?> 
<?php include (JQUERY_PATH."jqueryAccionEditarEliminar.html"); ?> 
<?php include (JQUERY_PATH."jqueryMenuBreadcrums.html"); ?>

</body>
</html>
