<div class="container" style="display:block;">
 
    <div class="row">
      <div class="col-sm">
        <p class="h2 text-left">  JUGADORES: </p> 
      </div>
      <div class="col-sm">
      </div>
      <div class="col-sm">
        <button id="botonMostrarJugadores" class="boton-mostrar text-left"> Mostrar jugadores  </button>
      </div>
    </div>
 
</div>

<?php
 $jugadores = new Jugador ("jugadores");
 $tablaJugadores = $jugadores->getAll();
?>

<div id="mostrandoJugadores" class="mostrando row overflow-auto" style="display:block;">
          
    <table class="bg-dark table table-striped">
        <p class="h4 text-center separador"> MOSTRANDO JUGADORES </p>
        <thead>
          <tr>
            <th scope="col"> Nombre </th>
          
          </tr>
        </thead>
        <tbody>
          <?php 

            for($i=0 ; $i < count($tablaJugadores); $i++ ) {
              $nombre = $tablaJugadores[$i]->nombre;
              if(!($nombre =="admin")){
                    echo "<tr>";
                    echo "<td>";
                            if($tablaJugadores[$i]->id_jugadores == $_SESSION["id_jugadores"]){
                              echo "<span style='color:#b14b4b'>$nombre </span>";
                            } else{
                              echo $nombre;
                            }
                          
                    echo "<td>";
                                  
                echo "</tr>";  
              }
            }
          ?>
        </tbody>
      </table>
</div>