<?php
//Base para los controladores
require_once 'controller/ControladorVistas.php';
$mvc = new ControladorVistas();
session_start();
$mvc->vistasIndex();

if(isset($_GET["cerrar"])){
    $mvc->cerrarSesion();
} else{
    $mvc->vistasIndex();
}

?>
