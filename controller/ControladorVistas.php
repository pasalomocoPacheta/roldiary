<?php
class ControladorVistas{
 
    // Se utiliza para invocar el archivo que contiene las vistas
    public static function vistasIndex(){

        require_once "view/indexAPLICACION.php";        

    }

     public static function RedirigirvistasAplicacion(){

        ControladorVistas::redirigirIndexSinoInicioSesion();

            if($_SESSION['sess_user'] == "admin"){

                echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";

            }else{
               
                // Si se ha dado click en crear anécdotas, entonces se redirige en cuanto se inice sesión a anécdotas
                if($_SESSION['views'] == "crearAnecdotaIndex" || isset($_SESSION["idPersonajeSelecionado"])){
                    echo "<script type='text/javascript'> document.location = 'anecdotas.php'; </script>";
                } else if(isset($_SESSION["id_jugadores"]) || $_SESSION['views'] == "crearPersonajeIndex"){
                    echo "<script type='text/javascript'> document.location = 'personajes.php'; </script>";
                }
               
            }

            

    }

    public function vistaNavesAdminesJugadorPersonajes(){
        if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
            echo "<a id='controladorPersonajes' class='nav-link'>PERSONAJES</a>";
            } else{
            echo "<a class='nav-link' href='personajes.php'>PERSONAJES</a>";
        } 
    }

    public function vistaNavesAdminesJugadorJugadores(){
        if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
            echo "<a id='controladorJugadores' class='nav-link'>JUGADORES</a>";
        } else{
            echo "<a class='nav-link' href='jugadores.php'>JUGADORES</a>";
        } 
    }

    public function vistaNavesAdminesJugadorAnecdotas(){
        if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
            echo "<a id='controladorAnecdotas' class='nav-link'>ANÉCDOTAS</a>";
            } else{
            echo "<a class='nav-link' href='anecdotas.php'>ANÉCDOTAS</a>";
        } 
    }

    public function vistaCartaPersonajes(){
        if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
                       
            echo "<a id='controladorPersonajes'>
                    <div class='bg-dark card card-body efectoHover'>            
                            Crear personaje
                    </div>
               </a>";
          } else if( isset($_SESSION['sess_user'])){
              echo "<a class='nav-link' href='personajes.php'>
              <div class='bg-dark card card-body efectoHover '>            
                            Crear personaje
                    </div>
              </a>";
          } else{
              // EL name se usa en ajax para guardar el dato ("crearPersonajeIndex")
              // dentro de un campo hidden que está en el formulario
              // del loguin. Su uso sirve para redirigir a una vista u a otra
            echo "
            <div class=' nav-link bg-dark card card-body efectoHover entrar' 
                        id='crearPersonajeIndex' 
                        name='crearPersonajeIndex'>            
                          Crear personaje
                  </div>
            ";
          }
    }

    public function vistaCartaAnecdotas(){
        if(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin") { 
                       
            echo "<a id='controladorAnecdotas'>
                    <div class='bg-dark card card-body efectoHover '>            
                            Crear anécdotas
                    </div>
               </a>";
          } else if( isset($_SESSION['sess_user'])){
              echo "<a class='nav-link' href='anecdotas.php'>
              <div class='bg-dark card card-body efectoHover '>            
                            Crear anécdotas
                    </div>
              </a>";
          } else{
            echo "
            <div class=' nav-link bg-dark card card-body efectoHover entrar' id='crearAnecdotaIndex' name='crearAnecdotaIndex'>            
                          Crear Anécdota
                  </div>
            ";
          }

    }

    public static function redirigirPersonajes(){
        if(isset($_SESSION['sess_user'])){
            echo "<script type='text/javascript'> document.location = 'personajes.php'; </script>";
        }
    }

    public static function redirigirAnecdotas (){

        if(isset($_SESSION['idPersonajeSelecionado'])){
            echo "<script type='text/javascript'> document.location = 'anecdotas.php'; </script>";
        }

    }

     public static function redirigirIndexSinoInicioSesion (){

        if(!(isset($_SESSION['sess_user']))){
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }

    }

     public static function redirigirIndexSinoEsAdmin (){
        if(isset( $_SESSION['sess_user']) && $_SESSION['sess_user'] == "admin"){
            // echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
        } else{
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }
    }

     public static function cerrarSesion(){
        $_SESSION = array();
        session_destroy();
        setcookie(session_name(), time()-1000);
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }

    // public function jugadores ($usuario){

    //     require_once "view/webPrincipal/personajes.php";
    //     Los header location no me han funcionado bien https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working/30283281
    //     https://stackoverflow.com/questions/2710079/php-header-location-redirect-doesnt-work-why
    //     echo "<script type='text/javascript'> document.location = 'view/webPrincipal/personajes.php'; </script>";
    // }


  
 }
?>

