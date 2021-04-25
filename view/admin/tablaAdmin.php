<div id="mostrandoJugadores" class="row" style="display:block;">
          
    <table class="table table-striped">
        <p class="h4 text-center separador"> MOSTRANDO JUGADORES </p>
        <thead>
          <tr>
            <th scope="col"> Nombre </th>
          <!-- SOLO EL MÁSTER PUEDE EXPULSAR JUGADORES -->
            <th scope="col"> Eliminar jugador </th>
          </tr>
        </thead>
        <tbody>
          <?php 

            for($i=0 ; $i < count($tablaJugadores); $i++ ) {
 
                      echo "<tr>";
                      echo "<td>";
                              $jugadorEliminar = $tablaJugadores[$i]->nombre;
                          echo $jugadorEliminar;             
                      echo "<td>";
                            if(!($jugadorEliminar == "admin")){
                              echo "<button style='cursor:auto' class='btn-danger'> <a style='color:black' href='admin.php?Borrar=$jugadorEliminar'=> <i class='fas fa-trash-alt'></i> </a></button> " ; 
                            }           
                  echo "</tr>";  
                }
              

          ?>
        </tbody>
      </table>



</div>