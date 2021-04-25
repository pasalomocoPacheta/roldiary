<?php 
class ControladorPersonajes extends ControladorVistas{
    

    public static function comprobarSiHayPersonajes (){
        $personajes = new Personaje ("personajes");
        if(isset($_SESSION['id_jugadores'])){
            $tablaPersonajesFkJugador = $personajes->getAllByFkJugador($_SESSION['id_jugadores']);
            if($tablaPersonajesFkJugador == "0 resultados devueltos" ){
                $_SESSION["comprobarSiHayPersonajes"] = false;
                include_once (JQUERY_PATH."recargarUnaVezLaPagina.html");
                require_once "view/formularios/formularioIncluirPersonaje.php";
            }else{
                require_once "view/formularios/selectEscogerPersonaje.php";
                require_once "view/personajes/vistaAniadirMostrarPersonajes.php";
                include (FORMULARIOS_PATH."formularioIncluirPersonaje.php") ;
                include (TABLAS_PATH."tablaPersonajes.php") ;
                // require_once "view/formularios/formularioIncluirPersonaje.php";
                // require_once "view/tablas/tablaPersonajes.php"; 
            }
        } else{
            ControladorPersonajes::RedirigirvistasAplicacion();
        }
        
    
    }
    public static function clickEditarDescripcionPersonaje(){

        require_once 'model/modeloBase.php';
        require_once 'model/personajes.php';
        $personaje = new Personaje("personajes");
        if(isset($_GET["IDEditarDescripcionPersonaje"]) ){
            include "view/formularios/formularioEditarDescripcionPersonaje.php" ;
        }

    }
    

    public static function clickEditarNombrePersonaje(){

        require_once 'model/modeloBase.php';
        require_once 'model/personajes.php';
        $personaje = new Personaje("personajes");
        if(isset($_GET["IDEditarNombrePersonaje"]) ){
            include "view/formularios/formularioEditarNombrePersonaje.php" ;
        }

    }

    public static function clickBorrarPersonaje(){

        require_once 'model/modeloBase.php';
        require_once 'model/personajes.php';
        $personaje = new Personaje("personajes");
        if(isset($_GET["IDBorrarPersonaje"]) ){
            include "view/formularios/formularioBorrarSeguroPersonaje.php" ;
        }
        if(isset($_GET["BorrarDefinitivamentePersonaje"])){
            echo $_GET["BorrarDefinitivamentePersonaje"];
            $personaje->deleteById($_GET["BorrarDefinitivamentePersonaje"]);
            // echo "<script>
            //       alert('Personaje eliminado');
            //     </script>";    
            unset( $_SESSION['nombrePersonajeSelecionado'])  ;  
            unset( $_SESSION['idPersonajeSelecionado'])  ;  
            ControladorPersonajes::redirigirPersonajes();
        }

    }

    public static function formularioComenzarAescribirAnecdotasConPersonaje(){

        if(isset($_POST["seleccionarPersonaje"])){

            $_SESSION['nombrePersonajeSelecionado'] = $_POST["personajesDisponibles"];
            $personaje = new Personaje("personajes");
            $_SESSION['idPersonajeSelecionado'] = (int) $personaje->getIdByNombre( $_POST["personajesDisponibles"]);
            ControladorPersonajes::redirigirAnecdotas();
        }



    }


    public static function modificarDescripcionPersonaje($id, $descripcion){
        $personajes = new Personaje ("personajes");
        
        if( $personajes->editDescription($id, $descripcion)){
            // echo "<script type=\"text/javascript\">
            // alert('Personaje modificado con exito');
            //      </script>";
            ControladorPersonajes::redirigirPersonajes();
        } else{
            echo "<script type=\"text/javascript\">
            alert('Fallo en la modificación');
             </script>";
            ControladorPersonajes::redirigirPersonajes();
        }
        
    }


    public static function modificarNombrePersonaje($id, $nombre){
        $personajes = new Personaje ("personajes");
        
        if(  $personajes->editName($id, $nombre) ){
            // echo "<script type=\"text/javascript\">
            // alert('Personaje modificado con exito');
            //      </script>";
            ControladorPersonajes::redirigirPersonajes();
        } else{
            echo "<script type=\"text/javascript\">
            alert('Fallo en la modificación');
             </script>";
            ControladorPersonajes::redirigirPersonajes();
        }
        
    }



    public static function crearPersonaje($nombrePersonaje, $descripcion, $fechaCreacionPersonaje,  $newFileName ){
        $personajes = new Personaje ("personajes");
        $personajes->setNombre($nombrePersonaje);
        $personajes->setDescripcion($descripcion);
        $personajes->setFkJugadorAsociado($_SESSION['id_jugadores']);
        $personajes->setFechaCreacionPersonaje($fechaCreacionPersonaje);
        $personajes->setImagen($newFileName);
        
        if( $personajes->save()){
            unset($_SESSION["comprobarSiHayPersonajes"]);
            // echo "<script type=\"text/javascript\">
            // alert('Personaje creado con exito');
            //      </script>";
            ControladorPersonajes::redirigirPersonajes();
        } else{
            echo "<script type=\"text/javascript\">
            alert('Fallo en la creacion');
             </script>";
            ControladorPersonajes::redirigirPersonajes();
        }
        
    }

    public static function formularioCreacionPersonaje (){
        $errores = null;
        
        if(isset($_POST["CrearPersonaje"])){
              
               unset($_POST["CrearPersonaje"]); 
               $fechaCreacionPersonaje = $_POST["hiddenFecha"];
             
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

            // https://stackoverflow.com/questions/9243230/php-simple-file-upload-form-doesnt-work/9243280
            if(!empty($_FILES["uploadedFile"])){

                echo "<script> console.log(XXXXXXXX); </script>";

                $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
                $fileName = $_FILES['uploadedFile']['name'];
                $fileSize = $_FILES['uploadedFile']['size'];
                $fileType = $_FILES['uploadedFile']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $allowedfileExtensions = array('jpg', 'jpge', 'png', 'gif');
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // directory in which the uploaded file will be moved
                    include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');
                    $uploadFileDir = IMG_PATH . "/subidasPorJugadores/personajes/";
                    $dest_path = $uploadFileDir . $newFileName;
                    
                    if(move_uploaded_file($fileTmpPath, $dest_path)){
                        // echo "<script>alert('ARCHIVO SUBIDO CORRECTAMENTE')</script>";
                    }else{
                        echo '<br>There was some error moving the file to upload directory.';
                    }
    
                } else {
                    echo "<script> alert('LA EXTENSIÓN DE LA IMAGEN SOLO PUEDE SER .JPG, .JPGE O .PNG')</script>";
                }
                
            }else{
                $errores .= "Falta imangen.";
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                ControladorPersonajes::crearPersonaje($nombrePersonaje, $descripcion, $fechaCreacionPersonaje, $newFileName);
            } else{
                $errores .= "Rellena los datos que faltan.";
                echo "<script type=\"text/javascript\">
                         alert('$errores');
                      </script>";
            }

        }
        
        


    }

    public static function formularioEditarNombrePersonaje (){
        $errores = null;
        
        if(isset($_POST["EditarNombrePersonaje"])){
              
               unset($_POST["EditarNombrePersonaje"]); 
               $id = $_POST["idNombrePersonaje"];
             
            if(!empty($_POST["nombrePersonaje"])){
                $nombrePersonaje = $_POST["nombrePersonaje"];
            } else{
                $errores .= "Introduce un nombre.";
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                ControladorPersonajes::modificarNombrePersonaje($id, $nombrePersonaje);
            } else{
                $errores .= "Rellena los datos que faltan.";
                echo "<script type=\"text/javascript\">
                         alert('$errores');
                      </script>";
            }

        } 
            


    }

    public static function formularioEditarDescripcionPersonaje (){
        $errores = null;
        
        if(isset($_POST["EditarDescripcionPersonaje"])){
              
               unset($_POST["EditarDescripcionPersonaje"]); 
               $id = $_POST["idDescripcionPersonaje"];
             
            if(!empty($_POST["descripcion"])){
                $descripcion = $_POST["descripcion"];
            } else{
                $errores .= "Introduce una descripción.";
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                ControladorPersonajes::modificarDescripcionPersonaje($id, $descripcion);
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