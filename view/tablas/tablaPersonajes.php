<?php 
  $personajes = new Personaje ("personajes");
  $tablaPersonajes = $personajes->getAll();
  $jugador = new Jugador ("jugadores");
  $tablaJugadores = $jugador->getAll();
?>
<section class="portfolio" >
	<div class="container-fluid">
		<div class="row">

            <!-- <div class="bg-dark card card-body col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                       
            </div> -->


			<div  class="bg-dark gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="gallery-title"> Personajes de los jugadores: </h1>
                    <div align="center">
                        <button class="filter-button" data-filter="all">Todos </button>
                        <?php 
                            
                            for($i=0 ; $i < count($tablaJugadores); $i++ ) {
                                $nombreJugador = $tablaJugadores[$i]->nombre; 
                                if(!($nombreJugador == "admin")){
                                    echo "<button class='filter-button' data-filter='$nombreJugador'> $nombreJugador </button>&nbsp;";
                                } 
                            }
                            
                        ?>
                    </div>
    
			    </div>
            </div>
			<br/>
             <div class='separador'></div>
             <div class="row" id="mostrandoPersonajes">
        
            <?php 
              for($i=0 ; $i < count($tablaPersonajes); $i++ ) {
                $fechaCreacion = $tablaPersonajes[$i]->fecha_creacion_personaje; 
                $id = $tablaPersonajes[$i]->id_personajes;
                $nombre = $tablaPersonajes[$i]->nombre;
                $nombrePersonaje= $tablaPersonajes[$i]->nombre; 
                $descripcion = $tablaPersonajes[$i]->descripcion;
                $imagen = $tablaPersonajes[$i]->imagen;
                $nombreJugador = $jugador->getNombreById((int) $tablaPersonajes[$i]->fk_jugador_asociado );

        
                echo "<div class='col-md-4 filter $nombreJugador'>";
                    echo "<div class='bg-dark gallery_product'>";
                        // echo "<div class='contenedorBorrado'>";
                            echo "<div class='text-center h4'> $nombre";
                           
                            echo "</div>";
                                
                                    echo "<a href='view/img/subidasPorJugadores/personajes/$imagen'>"; 
                                        echo "<img align='center' class='img-responsive' alt='' src='view/img/subidasPorJugadores/personajes/$imagen' /></a>";
                                    echo  "</a>";  
                                    echo "<div class='caption'>"; 
                                            echo "<p class='text-center'> $descripcion ";
                                     
                                        echo "</p>";
                                        if($_SESSION['id_jugadores'] == $tablaPersonajes[$i]->fk_jugador_asociado){
                                          
                                            echo "<span class='botones'> 
                                                    <a style='color:black' href='personajes.php?IDBorrarPersonaje=$id&NombrePersonaje=$nombrePersonaje'> 
                                                        <i class='fas fa-trash-alt '></i>	 
                                                    </a>
                                                  </span>   
                                                " ;  
                                        } 
                                        echo ($_SESSION['id_jugadores'] == $tablaPersonajes[$i]->fk_jugador_asociado ? 
                                        "<div class='botones editar btn-group dropright'>
                                            <button class='bg-transparent borderTransparent dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <i class='fas fa-edit iconos'></i>
                                            </button>
                                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                                <a class='dropdown-item' href='personajes.php?IDEditarNombrePersonaje=$id&NombrePersonaje=$nombrePersonaje'>Nombre</a>
                                                <a class='dropdown-item' href='personajes.php?IDEditarDescripcionPersonaje=$id&NombrePersonaje=$nombrePersonaje'>Descripcion</a>
                                                <a class='dropdown-item' href='personajes.php?IDEditarImagenPersonaje=$id&NombrePersonaje=$nombrePersonaje'>Imagen</a>
                                            </div>
                                        </div>
                                            <p class='text-center'><small>$fechaCreacion</small></p>": '');
                                  
                                    echo "</div>";          
                                  
                    echo "</div>";                      
              echo "</div>";
             
              }
            
            ?>
              </div>
		</div>
	</div>
</section>




