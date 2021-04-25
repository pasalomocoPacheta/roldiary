<?php
class ControladorRegistro extends ControladorVistas {
  
    public function registrar($usuario, $correo, $pass, $date){
        require_once 'model/modeloBase.php';
        require_once 'model/jugadores.php';
        $jugadores = new Jugador("jugadores");
        if($jugadores->comprobarNombreRepetidoJugadores($usuario)){
            echo "<script type=\"text/javascript\">
            alert('Nombre ya existe. Prueba otro');
                    </script>";
        } else{
            $jugadores->setNombre($usuario);
            $jugadores->setCorreo($correo);
            $jugadores->setPassword(password_hash($pass, PASSWORD_DEFAULT));
            $jugadores->setFechaRegistro($date);
            $jugadores->setAdmin(0);
            $jugadores->save();           
            echo "<script type=\"text/javascript\">
            alert('Usuario registrado correctamente');
                    </script>";
        }      
        
    }
     
    public function formularioRegistro(){
    
        $errores = null;
        
            if(isset($_POST["submitRegistro"])){
               unset($_POST["submitRegistro"]); 
            
            if(!empty($_POST["usuario"])){
                $usuario = $_POST["usuario"];
            } else{
                $errores .= "Introduce un nombre.";
            }
            if(!empty($_POST["correo"])){
                $correo = $_POST["correo"];
            } else{
                $errores .= "Introduce un correo.";
            }
            if(!empty($_POST["pass"])){
                $pass = $_POST["pass"];
            } else{
                $errores .= "Falta contraseña.";
            }
            if(isset($_POST["date"])){
                $date = $_POST["date"];
            }

            if($errores == null){
                // echo "Usuario introducido correctamente";
                $this->registrar($usuario, $correo, $pass, $date);
            } else{
                $errores .= "Rellena los datos que falta";
                echo "<script type=\"text/javascript\">
                         alert('$errores');
                      </script>";
            }

        }  
        
        
    
    }

  
 }



?>

    
    
