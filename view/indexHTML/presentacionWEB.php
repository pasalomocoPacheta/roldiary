<!-- LAS TRES COLUMNAS DEL INDEX: 
CAROUSEL IMAGENES, 
3 BLOQUES CON CITAS DE GENTE QUE USA LA APLICACIÓN,
3 IMÁGENES DE CONTENIDO CUALQUIERA -->

<div class="separador cerrarFormulariosyEfectoBlur">

</div>

<div id="carouselIndex" class="carousel slide" data-ride="carousel">
  <div class="cerrarFormulariosyEfectoBlur card-header text-center bg-dark text-white">
    <h1> ROLDIARY, tu aplicación para jugar al rol </h1>
  </div>

  <div class="container separador">
    <div class="row">

      <div class="col-sm cerrarFormulariosyEfectoBlur">

            <p>
              <a class="btn bg-dark dropdown-toggle" data-toggle="collapse" href="#InstruccionesUso" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span style="color:white;">Pasos simples para el uso</span>
              </a>
            </p>
            <div class="collapse" id="InstruccionesUso">
              
              <div class="bg-dark card card-body">
                  <div class="card-body text-center">
                                
                          1) Regístrate<br>
                          2) Inicia sesión<br>
                          3) Crea un personaje<br>
                          4) Escribe anécdotas de tus partidas con ese personaje
                  
                  </div>
              </div>
            </div>

      </div>

      <div class="col-sm" >

            <?php                 
                $mvc->vistaCartaPersonajes();
            ?>                  
         
      </div>

      <div class="col-sm">
              
      <?php  $mvc->vistaCartaAnecdotas(); ?> 
    
      </div>

    </div>

  </div>

  <div class="cerrarFormulariosyEfectoBlur">

        <div class="efectoCajaBoxShadow carousel-inner">
            <div class="carousel-item active">
                <img src="view/img/logo.jpg" class="d-block w-100" alt="Jugando">
            </div>
            <div class="carousel-item">
                <img src="view/img/fotoGuapa1.jpg" class="d-block w-100" alt="Jugando">
            </div>
            <div class="carousel-item">
                <img src="view/img/iniciacion-top.jpg" class="d-block w-100" alt="Jugando">
            </div>
        </div>
        

        <p class="h3 text-center indexContainers" > Lo que la gente opina: </p>

        <div id="second-row-container" class="card-deck separador">
            <div class="card">
              <div class="card-body text-white bg-dark">
                <h5 class="card-title">Lola Flores</h5>
                <p class="card-text"> <cite> Usando la aplicación durante la partida de rol nos reímos muchísimo. Qué día más genial.  </cite> </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body text-white bg-dark">
                <h5 class="card-title">Paco Martínez </h5>
                <p class="card-text"> <cite> Nunca había probado ROLDIARY hasta que me la recomendó una amiga. Ahora nuestras anécdotas durante la partida están bien conservadas. </cite> </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body text-white bg-dark">
                <h5 class="card-title">Federica Jiménez</h5>
                <p class="card-text"><cite> Todo el mundo debería utilizar ROLDIARY en sus partidas de rol porque así nunca se olvidan los buenos recuerdos.  </cite></p>
              </div>
            </div>
          </div>

        <div id="third-row-container" class="container indexContainers">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-7 ">
                    <img src="view/img/dado3.jpg" width="400px" height="140px" class="efectoCajaBoxShadow  center-block img-fluid imagen-circular" />  
                </div>
                <div class="col-md-5">
                    <img src="view/img/dado1.jpg" width="400px" height="140px" class="efectoCajaBoxShadow  center-block img-fluid imagen-circular" />
                </div>
            </div>

        </div>

      </div>    
</div>  