<div class="container separador"> </div>
<div class="container">
    <div class="row">
      <div class="col-3">
      </div>
      <div class="col-6">
      
        <div class='boton-incluir nav-link bg-dark card card-body efectoHover'>   
          <p class="h4 text-left" style="text-decoration: none">  Selecciona un personaje y comienza a escribir: </p>          
                  <form action="" method="POST">
                          <select name="personajesDisponibles"  class="form-control">
                          <?php 
                                  $personajes = new Personaje ("personajes");
                                  $tablaPersonajes = $personajes->getAll();
                                  for($i=0 ; $i < count($tablaPersonajes); $i++ ) {
                                    // Solo puedes escoger personajes creador por el jugador
                                    if($_SESSION['id_jugadores'] == $tablaPersonajes[$i]->fk_jugador_asociado){
                                      $nombrePersonaje= $tablaPersonajes[$i]->nombre;
                                      echo"<option value='$nombrePersonaje'>$nombrePersonaje</option>";  
                                    }               
                              }
                              ?> 
                          </select>
                          <br>
                          
              <input type="submit" name="seleccionarPersonaje" value="Seleccionar">  
      
              </form>
          </div>

      </div>

      <div class="col-3">
      </div>

    </div>
 
</div>



