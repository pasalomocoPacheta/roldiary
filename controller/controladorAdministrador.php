<?php 
class ControladorAdministrador extends ControladorVistas {

    public static function controladorVistasAdmin (){

        include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');
        require_once (ADMIN_PATH."tablaAdminJugadores.php");
        require_once (ADMIN_PATH."tablaAdminPersonajes.php");
        require_once (ADMIN_PATH."tablaAdminAnecdotas.php");
  
    }

    public static function borrarJugador (){
        require_once 'model/modeloBase.php';
        require_once 'model/jugadores.php';
        $jugadores = new Jugador("jugadores");
        if(isset($_GET["Borrar"]) ){
            include "view/admin/formularioBorrarSeguroJugadorAdmin.php" ;
        }
        if(isset($_GET["BorrarDefinitivamenteJugador"])){
            $jugadores->deleteBy("nombre", $_GET["BorrarDefinitivamenteJugador"]);
            // echo "<script>
            //       alert('Jugador $_GET[BorrarDefinitivamenteJugador] eliminado');
            //     </script>";
            echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";    
        }
    }

    public static function borrarPersonaje(){

        require_once 'model/modeloBase.php';
        require_once 'model/personajes.php';
        $personaje = new Personaje("personajes");
        if(isset($_GET["IDBorrarPersonaje"]) ){
            include "view/admin/formularioBorrarSeguroPersonajeAdmin.php" ;
        }
        if(isset($_GET["BorrarDefinitivamentePersonaje"])){
            echo $_GET["BorrarDefinitivamentePersonaje"];
            $personaje->deleteById($_GET["BorrarDefinitivamentePersonaje"]);
            // echo "<script>
            //       alert('Personaje eliminado');
            //     </script>";    
            echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
        }

    }

    public static function borrarAnecdota(){

        require_once 'model/modeloBase.php';
        require_once 'model/Anecdotas.php';
        $anecdota = new Anecdota("anecdotas");
        if(isset($_GET["IDBorrarAnecdota"]) ){
            include "view/admin/formularioBorrarSeguroAnecdotaAdmin.php" ;
        }
        if(isset($_GET["BorrarDefinitivamenteAnecdota"])){
            echo $_GET["BorrarDefinitivamenteAnecdota"];
            $anecdota->deleteById($_GET["BorrarDefinitivamenteAnecdota"]);
            // echo "<script>
            //       alert('Anecdota eliminada');
            //     </script>";    
            echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";   
        }

    }

    
}
?>




