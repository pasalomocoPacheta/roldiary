<div class="container separador"></div>
<div id="mostrandoAnecdotasJugadorSesion" class="mostrando" style="display:block;">
    <table class="bg-dark table table-striped">
    <caption class="bg-dark text-center"> Mostrando anécdotas del jugador <?php if(isset($_SESSION["id_jugadores"])){ echo $_SESSION['sess_user'];}?> </caption>
     
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
                    for($i=0 ; $i < count($tablaAnecdotasFkPersonajeIdJugador); $i++ ) {
                      $id = $tablaAnecdotasFkPersonajeIdJugador[$i]->id_anecdotas;
                      
                  
                          echo "<tr>";
                              echo "<td>";
                                  echo $tablaAnecdotasFkPersonajeIdJugador[$i]->contenido;  
                                  echo "<span>
                                            <a style='color:black'href='anecdotas.php?IDEditarContenidoAnecdota=$id'>
                                              <i class='fas fa-edit'></i>
                                            </a>
                                       </span>";           
                              echo "</td>";

                              echo "<td>";
                                  echo $tablaAnecdotasFkPersonajeIdJugador[$i]->campania;  
                                  echo "<span>
                                          <a style='color:black'href='anecdotas.php?IDEditarCampaniaAnecdota=$id'>
                                            <i class='fas fa-edit'></i>
                                          </a>
                                    </span>";  
                              echo "</td>";

                              echo "<td>";
                                    echo $personajeEscritor->getNombreById((int) $tablaAnecdotasFkPersonajeIdJugador[$i]->fk_personaje_escritor);  
                              echo "</td>";
                              
                              echo "<td>";
                                    echo $tablaAnecdotasFkPersonajeIdJugador[$i]->fecha;   
                              echo "</td>";

                              echo "<td>";

                                echo "
                                <a style='color:white' 
                                  href='anecdotas.php?IDBorrarAnecdota=$id'> 
                                    <i class='fas fa-trash-alt'></i> 
                                </a>
                                      " ;        
                                    
                              echo "</td>";

                          echo "</tr>";  
                        }

                    ?>     
              </tbody>
            </table>
</div>

<div id="mostrandoAnecdotasTodosJugadores" class="mostrando" >
        <table class="bg-dark table table-striped">
        <caption class="bg-dark text-center"> Mostrando anécdotas de todos los jugadores </caption>
            <thead>
                <tr>
                  <th scope="col"> Contenido </th>
                  <th scope="col"> Campaña </th>
                  <th scope="col"> Personaje Escritor </th>
                  <th scope="col"> Fecha </th>
                </tr>
              </thead>
              <tbody>
              <?php 
              // TABLA ANÉCDOTAS DEL JUGADOR QUE HA INICIADO SESIÓN
                $personajeEscritor = new Personaje('personajes');
                $tablaAnecdotasTodosJugadores= $Anecdotas->getAll();
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

                          echo "</tr>";  
                        }

                    ?>     
              </tbody>
            </table>
</div>