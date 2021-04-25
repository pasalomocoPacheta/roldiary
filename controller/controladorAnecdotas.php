<?php 
class ControladorAnecdotas extends ControladorVistas{

    public static function comprobarSiHayAnecdotas (){
        $Anecdotas = new Anecdota ("anecdotas");
        if(isset($_SESSION['idPersonajeSelecionado'])){
            $tablaAnecdotasFkPersonajeIdJugador =  $Anecdotas->getAllByFkPersonajeEscritorConIdJugador($_SESSION['id_jugadores']);
            if($tablaAnecdotasFkPersonajeIdJugador == "0 resultados devueltos" ){
                $nombrePersonajeSelecionado = $_SESSION['nombrePersonajeSelecionado'];
                echo "<p class='h5 text-center separador'>NO TIENES Anecdotas creadas como $nombrePersonajeSelecionado, AÑADE LA PRIMERA:</p>";
                require_once "view/formularios/formularioIncluirAnecdota.php";
            }else{
                // $tablaAnecdotas = $Anecdotas->getAll();
                require_once "view/anecdotas/vistaAniadirMostrarAnecdotas.php";
                require_once "view/formularios/formularioIncluirAnecdota.php";
                require_once "view/tablas/tablaAnecdotas.php"; 
                 
            }
        }else{
            echo "<p class='h5 text-center separador'>SELECIONA UN PERSONAJE 
                  DE LA LISTA </p>";
            $personajes = new Personaje ("personajes");
            $tablaPersonajes = $personajes->getAll();
            require_once "view/formularios/selectEscogerPersonaje.php";  
            ControladorPersonajes::formularioComenzarAescribirAnecdotasConPersonaje();   
        }
        
    
    }

    public static function clickEditarContenidoAnecdota(){

        require_once 'model/modeloBase.php';
        require_once 'model/personajes.php';
        $personaje = new Personaje("personajes");
        if(isset($_GET["IDEditarContenidoAnecdota"]) ){
            include "view/formularios/formularioEditarContenidoAnecdota.php" ;
        }

    }
    

    public static function clickEditarCampaniaAnecdota(){

        require_once 'model/modeloBase.php';
        require_once 'model/personajes.php';
        $personaje = new Personaje("personajes");
        if(isset($_GET["IDEditarCampaniaAnecdota"]) ){
            include "view/formularios/formularioEditarCampaniaAnecdota.php" ;
        }

    }

    public static function borrarAnecdota(){

        // require_once 'model/modeloBase.php';
        // require_once 'model/Anecdotas.php';
        $anecdota = new Anecdota("anecdotas");
        if(isset($_GET["IDBorrarAnecdota"]) ){
            include "view/formularios/formularioBorrarSeguroAnecdota.php" ;
        }
        if(isset($_GET["BorrarDefinitivamenteAnecdota"])){
            echo $_GET["BorrarDefinitivamenteAnecdota"];
            $anecdota->deleteById($_GET["BorrarDefinitivamenteAnecdota"]);
            // echo "<script>
            //       alert('Anecdota eliminada');
            //     </script>";    
            ControladorAnecdotas::redirigirAnecdotas();   
        }

    }

    public static function crearAnecdota($contenido, $campania, $fecha){
        $Anecdotas = new Anecdota ("anecdotas");
        $Anecdotas->setContenido($contenido);
        $Anecdotas->setCampania($campania);
        // var_dump($_SESSION['idPersonajeSelecionado']);
        $Anecdotas->setFkPersonajeEscritor($_SESSION['idPersonajeSelecionado']);
        $Anecdotas->setFecha($fecha);
        if( $Anecdotas->save()){
            // echo "<script type=\"text/javascript\">
            // alert('Anecdota creada con exito');
            //      </script>";
            // ControladorAnecdotas::redirigirAnecdotas();
        } else{
            echo "<script type=\"text/javascript\">
            alert('Fallo en la creacion');
             </script>";
            //  ControladorAnecdotas::redirigirAnecdotas();
        }
        
    }

    public static function modificarContenidoAnecdota($id, $nombre){
        $Anecdota = new Anecdota ("anecdotas");
        
        if(  $Anecdota->editContenido($id, $nombre) ){
            // echo "<script type=\"text/javascript\">
            // alert('Contenido modificado con exito');
            //      </script>";
            ControladorAnecdotas::redirigirAnecdotas();
        } else{
            echo "<script type=\"text/javascript\">
            alert('Fallo en la modificación');
             </script>";
            ControladorAnecdotas::redirigirAnecdotas();
        }
        
    }

    public static function formularioEditarContenidoAnecdota (){
        $errores = null;
        
        if(isset($_POST["editarContenidoAnecdota"])){
              
               unset($_POST["editarContenidoAnecdota"]); 
               $id = $_POST["IDEditarContenidoAnecdota"];
             
            if(!empty($_POST["contenidoAnecdota"])){
                $contenidoAnecdota = $_POST["contenidoAnecdota"];
            } else{
                $errores .= "Introduce una anécdota.";
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                ControladorAnecdotas::modificarContenidoAnecdota($id, $contenidoAnecdota);
            } else{
                $errores .= "Rellena los datos que faltan.";
                echo "<script type=\"text/javascript\">
                         alert('$errores');
                      </script>";
            }

        } 
            


    }

    public static function modificarCampaniaAnecdota($id, $nombre){
        $Anecdota = new Anecdota ("anecdotas");
        
        if(  $Anecdota->editCampania($id, $nombre) ){
            // echo "<script type=\"text/javascript\">
            // alert('Campaña modificada con exito');
            //      </script>";
            ControladorAnecdotas::redirigirAnecdotas();
        } else{
            echo "<script type=\"text/javascript\">
            alert('Fallo en la modificación');
             </script>";
            ControladorAnecdotas::redirigirAnecdotas();
        }
        
    }

    public static function formularioEditarCampaniaAnecdota (){
        $errores = null;
        
        if(isset($_POST["editarCampaniaAnecdota"])){
              
               unset($_POST["editarCampaniaAnecdota"]); 
               $id = $_POST["IDEditarCampaniaAnecdota"];
             
            if(!empty($_POST["campania"])){
                $campania = $_POST["campania"];
            } else{
                $errores .= "Introduce una descripción.";
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                ControladorAnecdotas::modificarCampaniaAnecdota($id, $campania);
            } else{
                $errores .= "Rellena los datos que faltan.";
                echo "<script type=\"text/javascript\">
                         alert('$errores');
                      </script>";
            }

        }

    }

    public static function formularioCreacionAnecdota (){
        $errores = null;
        
        if(isset($_POST["CrearAnecdota"])){
              
               unset($_POST["CrearAnecdota"]); 
             
            if(!empty($_POST["contenido"])){
                $contenido = $_POST["contenido"];
            } else{
                $errores .= "Introduce una contenido.";
            }
            if(!empty($_POST["campania"])){
                $campania = $_POST["campania"];
            } else{
                $errores .= "Falta campaña.";
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                // var_dump($contenido);
                // var_dump($campania);
                // var_dump($_POST["hiddenFecha"]);
                ControladorAnecdotas::crearAnecdota($contenido, $campania, $_POST["hiddenFecha"]);
            } else{
                $errores .= "Rellena los datos que faltan.";
                echo "<script type=\"text/javascript\">
                         alert('$errores');
                      </script>";
            }

        }
        
        


    }


}
?>