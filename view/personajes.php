<?php 
   include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');
   require_once (CONTROLLER_PATH."ControladorVistas.php");
   require_once (CONTROLLER_PATH."ControladorPersonajes.php");
   require_once (MODEL_PATH."modeloBase.php");
   require_once (MODEL_PATH."jugadores.php");
   require_once (MODEL_PATH."personajes.php");

   session_start();
   $mvc = new ControladorVistas();
   $mvc->redirigirIndexSinoInicioSesion();
   $ControladorPersonajes = new ControladorPersonajes();
   $ControladorPersonajes::formularioCreacionPersonaje();
   $ControladorPersonajes::formularioComenzarAescribirAnecdotasConPersonaje();
   $ControladorPersonajes::formularioEditarDescripcionPersonaje();
   $ControladorPersonajes::formularioEditarNombrePersonaje();

    // include "model/modeloBase.php" ;
    // include "model/personajes.php" ;
    // $personajes = new Personaje ("personajes");
    // $tablaPersonajes = $personajes->getAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php  include (CSS_PATH."headLinksMeta.html"); ?> 

</head>
<body>

<?php include (NAVIGATIONPANE_PATH."navigationPaneLeft.php"); ?> 

<a class="ir-arriba"  javascript:void(0) title="Volver arriba">
  <span class="fa-stack">
    <i class="fa fa-circle fa-stack-2x"></i>
    <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
  </span>
</a>
    <?php include (HEADER_PATH."headerAPLICACION.php"); ?> 
    <?php include (NAV_PATH."nav.php") ; ?>
    <?php $ControladorPersonajes::clickEditarNombrePersonaje(); 
          $ControladorPersonajes::clickEditarDescripcionPersonaje(); 
          $ControladorPersonajes::clickBorrarPersonaje();    ?> 

<div id="wrap" class="">

<div id="contenedorBotonMenuNavigationPane"> -->
  <button class="openbtn" onclick="openNav()">☰ &#8593 </button>  
</div>

  <div id="main" class="container clear-top ">

    

        <main id="containerPrincipal" class="container">
                
                <?php $ControladorPersonajes::comprobarSiHayPersonajes(); ?> 
                <!-- 
                AQUÍ PONDRÁ ADMIN O JUGADOR EN FUNCIÓN DE QUIÉN HAYA INICIADO SESIÓN      --> 
                <!--  PARA QUE APAREZCAN LOS DATOS DE LOS PERSONAJES O EL FORMULARIO DE CREACIÓN DE PERSONAJE   -->
                <!--  LOS DATOS DE LA BBDD SOBRE LOS PERSONAJES   -->
                
        
        </main>
</div>
  </div>
  <!-- BOTÓN SUBIR ARRIBA -->

<?php include (FOOTER_PATH."footer.html"); ?>    

<!--  BOTONES MOSTRAR / OCULTAR LA TABLA DE LOS DATOS  -->
<?php include (JQUERY_PATH."jqueryAccionEditarEliminar.html"); ?>
<?php include (JQUERY_PATH."jqueryPersonajes.html"); ?>
<?php include (JQUERY_PATH."jqueryIrArriba.html"); ?>
<?php include (JQUERY_PATH."jqueryGaleria.html"); ?>
<?php include (JQUERY_PATH."jqueryMenuBreadcrums.html"); ?>
<?php include (JQUERY_PATH."jqueryNavigationPane.html"); ?>

</body>
</html>
