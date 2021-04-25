<div class="container">
            
            <div class="row">
              <div class="col-sm">
                <p class="h2 text-left">  JUGADORES: </p> 
              </div>
            </div>
        
</div>
<?php  $jugadores = new Jugador ("jugadores");
    $tablaJugadores = $jugadores->getAll(); ?>

<div id="mostrandoJugadores" class="mostrando row" style="display:block;">
          
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

          if($tablaJugadores === "0 resultados devueltos" || count($tablaJugadores) == 1){
            echo "<p class='h1 text-center separador'>";
              echo "NO HAY JUGADORES REGISTRADOS";
            echo "</p>"; 
          } else{
            for($i=0 ; $i < count($tablaJugadores); $i++ ) {
 
              echo "<tr>";
              echo "<td>";
                      $jugadorEliminar = $tablaJugadores[$i]->nombre;
                  echo $jugadorEliminar;             
              echo "<td>";
                    if(!($jugadorEliminar == "admin")){
                      echo "<button style='cursor:auto' class='btn-danger'> 
                      <a style='color:black' href='admin.php?Borrar=$jugadorEliminar'=> <i class='fas fa-trash-alt'></i>	  </a>
                      </button> " ; 
                    }           
          echo "</tr>";  
        }

          }   

          ?>
        </tbody>
      </table>



</div>