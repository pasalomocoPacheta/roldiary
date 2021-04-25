<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
---- Include the above in your HEAD tag 
https://aprende-web.net/javascript/js7_2.php
-------- -->
<?php  include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');?>
<?php include_once (CONTROLLER_PATH."ControladorVistas.php" ); $mvc = new ControladorVistas();?>

<!doctype html>
<html lang="en">
<head>
    
    <?php 
         
          include (CSS_PATH."headLinksMeta.html");
     
    ?> 
</head>
<body>

<?php include (HEADER_PATH."headerAPLICACION.php"); ?>
<?php include (NAV_PATH."nav.php") ; ?>
<?php include (FORMULARIOS_PATH."registrerIndex.php"); ?>
<?php include (FORMULARIOS_PATH."loguinIndex.php"); ?>

<div id="wrap">
  <div id="main" class="container clear-top">

  <main id="containerPrincipal" class="container">

       
        <?php  include (INDEXHTML_PATH."presentacionWEB.php"); ?>   

            
    </main>

  </div>
</div>

<!-- BOTÓN SUBIR ARRIBA -->
  <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-arrow-up"></i></a>

<?php include (FOOTER_PATH."footer.html"); ?>   

<?php include (JQUERY_PATH."jqueryIndex.html"); ?> 
<?php include (JQUERY_PATH."jqueryCerrarFormulariosEfectoBlur.html"); ?> 



</body>
</html>
