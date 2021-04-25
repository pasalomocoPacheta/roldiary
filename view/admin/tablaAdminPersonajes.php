<?php 
  $tablaPersonajes = new Personaje("personajes");
  $tablaPersonajes = $tablaPersonajes->getAll();
?>
<div id="mostrandoPersonajes" class="mostrando row" style="display:block;">
          
    <table class="table table-striped">
        <p class="h4 text-center separador"> MOSTRANDO PERSONAJES </p>
        <thead>
          <tr>
            <th scope="col"> Nombre </th>
            <th scope="col"> Descripción </th>
            <th scope="col"> Borrar </th>
          </tr>
        </thead>
        <tbody>
        <?php 

          if($tablaPersonajes === "0 resultados devueltos"){
            echo "<p class='h1 text-center separador'>";
              echo "NO HAY PERSONAJES QUE MOSTRAR";
            echo "</p>"; 
          }else{
            for($i=0 ; $i < count($tablaPersonajes); $i++ ) {
              $id = $tablaPersonajes[$i]->id_personajes;
              $nombrePersonaje= $tablaPersonajes[$i]->nombre; 
                  echo "<tr>";
                      echo "<td>";
                          echo $tablaPersonajes[$i]->nombre;            
                      echo "</td>";
                      echo "<td>";
                           echo $tablaPersonajes[$i]->descripcion;  
                      echo "</td>";
                      echo "<td>";
                      // Controlamos que el personaje a eliminar sea del conjunto de personajes del usuario que ha iniciado la sesión
                      
                        echo "<button style='cursor:auto' class='btn-danger'> 
                        <a style='color:black' 
                        href='admin.php?IDBorrarPersonaje=$id&NombrePersonaje=$nombrePersonaje'> 
                        <i class='fas fa-trash-alt'></i> </a>
                              </button> " ;  
         
                      echo "</td>";

                  echo "</tr>";  
                }
          }
          ?>
          
        </tbody>
      </table>

</div>