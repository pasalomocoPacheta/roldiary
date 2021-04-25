<?php
class ControladorInicioSesion extends ControladorVistas {
  
    public function inicioSesion($usuario, $pass, $vistaPersonajeOAnecdota){
        require_once 'model/modeloBase.php';
        require_once 'model/jugadores.php';
        $jugadores = new Jugador("jugadores");
        
        if($jugadores->comprobarAdministrador($usuario,$pass)){
            $_SESSION['id_jugadores'] = (int) $jugadores->getIdByNombre($usuario);
            $_SESSION['sess_user'] = $usuario;
          
            parent::RedirigirvistasAplicacion();
        }else{

            if($jugadores->comprobarJugadores($usuario, $pass)){
                $_SESSION['id_jugadores'] = (int) $jugadores->getIdByNombre($usuario);
                $_SESSION['sess_user'] = $usuario;
                $_SESSION['views'] = $vistaPersonajeOAnecdota;
                
                parent::RedirigirvistasAplicacion();
            } else{
                echo "<script type=\"text/javascript\">
                alert('Comprueba los datos');
                </script>";
            }   
        }

   
        
    }

  
     
    public function formularioLoguin(){
    
        $errores = null;
        
        if(isset($_POST["submitLoguin"])){
              
               unset($_POST["submitLoguin"]); 
               $vistaPersonajeOAnecdota = $_POST["iniciarView"];
             
            if(!empty($_POST["usuario"])){
                $usuario = $_POST["usuario"];
            } else{
                $errores .= "Introduce un nombre.";
            }
            if(!empty($_POST["pass"])){
                $pass = $_POST["pass"];
            } else{
                $errores .= "Falta contraseña.";
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                // if( isset($_GET['ajax']) ){

                //     $_SESSION['views'] = $_GET["iniciar"];
                   
                //    }
                $this->inicioSesion($usuario, $pass, $vistaPersonajeOAnecdota);
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

    
    
