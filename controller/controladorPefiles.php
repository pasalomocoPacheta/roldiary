<?php 
class ControladorPerfiles extends ControladorVistas{

    public static function comprobarSiHayPerfil (){
        $perfil = new Perfil ("perfiles");
        if(isset($_SESSION['id_jugadores'])){
            $tablaperfilFkJugador = $perfil->getAllByFkJugador($_SESSION['id_jugadores']);
            if($tablaperfilFkJugador == "0 resultados devueltos" ){
                echo "<p class='h5 text-center separador'>NO TIENES perfil, AÑADE EL PRIMERO:</p>";
                require_once "view/formularios/formularioIncluirPersonaje.php";
            }else{
                $tablaperfil = $perfil->getAll();
                echo "<p class='h5 text-center separador'>Selecciona un personaje para escribir una anécdota o añade uno nuevo</p>";
                require_once "view/formularios/selectEscogerPersonaje.php";
                require_once "view/formularios/formularioIncluirPersonaje.php";
                require_once "view/tablas/tablaperfil.php"; 
            }
        } else{
            ControladorPerfiles::RedirigirvistasAplicacion();
        }
        
    
    }

    public static function borrarPerfil(){

        require_once 'model/modeloBase.php';
        require_once 'model/perfil.php';
        $personaje = new Personaje("perfil");
        if(isset($_GET["IDBorrarPersonaje"]) ){
            include "view/formularios/formularioBorrarSeguroPersonaje.php" ;
        }
        if(isset($_GET["BorrarDefinitivamentePersonaje"])){
            echo $_GET["BorrarDefinitivamentePersonaje"];
            $personaje->deleteById($_GET["BorrarDefinitivamentePersonaje"]);
            echo "<script>
                  alert('Personaje eliminado');
                </script>";    
            ControladorPerfiles::RedirigirvistasAplicacion();
        }

    }

    public static function formularioComenzarAescribirAnecdotasConPersonaje(){

        if(isset($_POST["seleccionarPersonaje"])){

            $_SESSION['nombreperfilelecionado'] = $_POST["perfilDisponibles"];
            $personaje = new Personaje("perfil");
            $_SESSION['idperfilelecionado'] = (int) $personaje->getIdByNombre( $_POST["perfilDisponibles"]);
            ControladorPerfiles::redirigirAnecdotas();
        }



    }

    public static function crearPerfil($nombrePersonaje, $descripcion){
        $perfil = new Personaje ("perfil");
        $perfil->setNombre($nombrePersonaje);
        $perfil->setDescripcion($descripcion);
        $perfil->setFkJugadorAsociado($_SESSION['id_jugadores']);
        if( $perfil->save()){
            echo "<script type=\"text/javascript\">
            alert('Personaje creado con exito');
                 </script>";
            ControladorPerfiles::RedirigirvistasAplicacion();
        } else{
            echo "<script type=\"text/javascript\">
            alert('Fallo en la creacion');
             </script>";
            ControladorPerfiles::RedirigirvistasAplicacion();
        }
        
    }

    public static function formularioCreacionPersonaje (){
        $errores = null;
        
        if(isset($_POST["CrearPersonaje"])){
              
               unset($_POST["CrearPersonaje"]); 
             
            if(!empty($_POST["nombrePersonaje"])){
                $nombrePersonaje = $_POST["nombrePersonaje"];
            } else{
                $errores .= "Introduce un nombre.";
            }
            if(!empty($_POST["descripcion"])){
                $descripcion = $_POST["descripcion"];
            } else{
                $errores .= "Falta descripcion.";
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                ControladorPerfiles::crearPerfil($nombrePersonaje, $descripcion);
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