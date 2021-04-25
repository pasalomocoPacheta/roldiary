<div id="mostrandoAnecdotasTodosJugadores" class="mostrando" >
      <p class="h4 text-center separador"> Mostrando anécdotas de todos los jugadores </p> 
      <table   class="table table-striped">
              <thead>
                <tr>
                  <th scope="col"> Contenido </th>
                  <th scope="col"> Campaña </th>
                  <th scope="col"> Personaje Escritor </th>
                  <th scope="col"> Fecha </th>
                  <th scope="col"> Borrar </th>
                </tr>
              </thead>
              <tbody>
              <?php 
              // TABLA ANÉCDOTAS DEL JUGADOR QUE HA INICIADO SESIÓN
                $personajeEscritor = new Personaje('personajes');
                $Anecdotas = new Anecdota ("anecdotas");
                $tablaAnecdotasTodosJugadores= $Anecdotas->getAll();
                if($tablaAnecdotasTodosJugadores == "0 resultados devueltos"){
                  echo "<p class='h1 text-center separador'>";
                      echo "NO HAY ANÉCDOTAS INTRODUCIDAS";
                  echo "</p>";  
                } else{
                  for($i=0 ; $i < count($tablaAnecdotasTodosJugadores); $i++ ) {
                    $id = $tablaAnecdotasTodosJugadores[$i]->id_anecdotas;
                    
                
                        echo "<tr>";
                            echo "<td>";
                                echo $tablaAnecdotasTodosJugadores[$i]->contenido;            
                            echo "</td>";

                            echo "<td>";
                                echo $tablaAnecdotasTodosJugadores[$i]->campania;  
                            echo "</td>";

                            echo "<td>";
                                  echo $personajeEscritor->getNombreById((int) $tablaAnecdotasTodosJugadores[$i]->fk_personaje_escritor);  
                            echo "</td>";
                            
                            echo "<td>";
                                  echo $tablaAnecdotasTodosJugadores[$i]->fecha;   
                            echo "</td>";

                            echo "<td>";
                              echo "<button style='cursor:auto' class='btn-danger'> 
                              <a style='color:black' 
                              href='admin.php?IDBorrarAnecdota=$id'> 
                              <i class='fas fa-trash-alt'></i>	</a>
                                    </button> " ;  
                            echo "</td>";

                        echo "</tr>";  
                      }
                }
                

                    ?>     
              </tbody>
            </table>
</div>